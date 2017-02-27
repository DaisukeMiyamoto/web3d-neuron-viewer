#!/bin/bash -x

BLENDER=~/bin/blender-2.78b-linux-glibc219-x86_64/blender
BLENDER_OPT=--background

IMPORT_PYTHON=./decimate_x3d.py
TARGET_LIST="\
nagatama_labels \
nagatama_outline \
suziguro_labels \
suziguro_outline \
yamamayuga_labels \
yamamayuga_outline \
"


for TARGET in ${TARGET_LIST}; do
    ${BLENDER} ${BLENDER_OPT} --python ${IMPORT_PYTHON} -- ${TARGET}
done
