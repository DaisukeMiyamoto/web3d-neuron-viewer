import bpy
import sys
import math
import os


def apply_dissolve(obj, angle=10):
    mod = obj.modifiers.new(name='decimate1', type='DECIMATE')
    mod.decimate_type = 'DISSOLVE'
    mod.angle_limit = math.radians(angle)
    bpy.context.scene.objects.active = obj
    bpy.ops.object.modifier_apply(modifier='decimate1', apply_as='DATA')
    print('Faces (DISSOLVE): %d' % len(obj.data.polygons))


def apply_collapse(obj, ratio=0.4):
    mod = obj.modifiers.new(name='decimate2', type='DECIMATE')
    mod.decimate_type = 'COLLAPSE'
    mod.ratio = ratio
    bpy.context.scene.objects.active = obj
    bpy.ops.object.modifier_apply(modifier='decimate2', apply_as='DATA')
    print('Faces (COLLAPSE): %d' % len(obj.data.polygons))


def export_x3d(filename):
    bpy.ops.export_scene.x3d(filepath=filename,
                             use_mesh_modifiers=True, use_normals=True,
                             use_selection=True, name_decorations=True)


if __name__ == '__main__':
    def main(work_dir):
        print("start main")
        argv = sys.argv
        argv = argv[argv.index("--") + 1:]
        if not len(argv) == 1:
            print('Error: save filename')
            quit()


        filename = argv[0]

        print('Processing %s' % filename)
        bpy.ops.import_scene.x3d(filepath=os.path.join(work_dir, filename + '.wrl'), filter_glob="*.x3d;*.wrl", axis_forward='Z', axis_up='-Y')

        bpy.ops.object.select_all(action='TOGGLE')

        for ob in bpy.data.objects:
            if not ('Shape_IndexedFaceSet' in ob.name or 'Base' in ob.name):
                ob.select = True
                bpy.ops.object.delete()

        bpy.ops.object.select_all(action='TOGGLE')

        ob = bpy.data.objects['Shape_IndexedFaceSet']
        ob.select = True
        bpy.ops.object.origin_set(type='ORIGIN_GEOMETRY', center='BOUNDS')
        ob.name = filename
        ob.scale = (0.01, 0.01, 0.01)
        print('Location: ', ob.location)
        ob.location = (0, 0, 0)

        print('Faces: %d' % len(ob.data.polygons))
        bpy.ops.wm.save_as_mainfile(filepath=os.path.join(work_dir, filename + '.blend'))
        export_x3d(os.path.join(work_dir, filename + '.x3d'))
        apply_dissolve(ob)
        export_x3d(os.path.join(work_dir, filename + '_decimate1.x3d'))
        apply_collapse(ob)
        export_x3d(os.path.join(work_dir,filename + '_decimate2.x3d'))
        bpy.ops.wm.save_as_mainfile(filepath=os.path.join(work_dir, filename + '_decimate.blend'))

        # bpy.ops.object.join()
        print('Finished!')

    main('/home/nebula/work/seki_data/x3d')
