#!/bin/bash

#target=10.0.0.1
target=192.168.1.68

while true; do
    (ping -c2 "$target" | grep "bytes from") || break
done

# enable something
mplayer snd/jammer.mp3

