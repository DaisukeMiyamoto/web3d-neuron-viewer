#!/bin/sh

TARGET_LIST="\
0004_regist \
0005_regist \
0008_regist \
0009_regist \
0012_regist \
0017_regist \
0019_regist \
0021_regist \
0655_regist \
0661_regist \
0663_regist \
0664_regist \
090815_4_sn_reg \
0965_regist \
0966_regist \
0967_regist \
0969_regist \
0970_regist \
0973_regist \
0984_regist \
0986_regist \
0988_regist \
0993_regist \
1009_regist \
1020_regist \
1068_regist \
1080_regist \
0004_regist_flip \
0005_regist_flip \
0008_regist_flip \
0009_regist_flip \
0012_regist_flip \
0017_regist_flip \
0019_regist_flip \
0021_regist_flip \
0655_regist_flip \
0661_regist_flip \
0663_regist_flip \
0664_regist_flip \
0965_regist_flip \
0966_regist_flip \
0967_regist_flip \
0969_regist_flip \
0970_regist_flip \
0973_regist_flip \
0984_regist_flip \
0986_regist_flip \
0988_regist_flip \
0993_regist_flip \
1009_regist_flip \
1020_regist_flip \
1068_regist_flip \
1080_regist_flip \
090815_4_sn_reg_flip\
"

for TARGET in ${TARGET_LIST}; do
    mkdir bingeo_${TARGET}
    aopt.exe -i ${TARGET}.x3d -G "bingeo_${TARGET}/:saic" -x ${TARGET}_aopt.x3d
done
