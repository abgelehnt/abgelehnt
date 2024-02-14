#!/bin/bash
set -ex

# curl 112.64.23.53:3163/cross_python.sh | sh -s

sudo apt update
sudo apt install wget gcc-aarch64-linux-gnu g++-aarch64-linux-gnu -y



# https://tukaani.org/xz/xz-5.4.3.tar.xz
wget https://tukaani.org/xz/xz-5.4.3.tar.xz  && tar -xf xz-5.4.3.tar.xz && cd xz-5.4.3
./configure CC=aarch64-linux-gnu-gcc CXX=aarch64-linux-gnu-g++ -host=aarch64-linux-gnu --prefix=`pwd`/../lib
make -j && make install
cd ..


# https://github.com/libffi/libffi/releases/download/v3.4.4/libffi-3.4.4.tar.gz
wget https://github.com/libffi/libffi/releases/download/v3.4.4/libffi-3.4.4.tar.gz && tar -xf libffi-3.4.4.tar.gz && cd libffi-3.4.4
./configure CC=aarch64-linux-gnu-gcc CXX=aarch64-linux-gnu-g++ -host=aarch64-linux-gnu --prefix=`pwd`/../lib
make -j && make install
cd ..


# https://www.zlib.net/zlib-1.2.13.tar.xz
wget https://www.zlib.net/zlib-1.2.13.tar.xz && tar -xf zlib-1.2.13.tar.xz && cd zlib-1.2.13
CC=aarch64-linux-gnu-gcc CXX=aarch64-linux-gnu-g++ ./configure --prefix=`pwd`/../lib
make -j && make install
cd ..


# https://www.openssl.org/source/openssl-3.0.9.tar.gz
wget https://www.openssl.org/source/openssl-3.0.9.tar.gz && tar -xf openssl-3.0.9.tar.gz && cd openssl-3.0.9
./Configure --cross-compile-prefix=aarch64-linux-gnu- linux-aarch64 --prefix=`pwd`/../lib
make -j && make install
cd ..


# https://www.sqlite.org/2023/sqlite-autoconf-3420000.tar.gz
wget https://www.sqlite.org/2023/sqlite-autoconf-3420000.tar.gz && tar -xf sqlite-autoconf-3420000.tar.gz && cd sqlite-autoconf-3420000
./configure CC=aarch64-linux-gnu-gcc CXX=aarch64-linux-gnu-g++ --host=aarch64-linux-gnu --prefix=`pwd`/../lib
make -j && make install
cd ..


# https://zenlayer.dl.sourceforge.net/project/libuuid/libuuid-1.0.3.tar.gz
wget https://zenlayer.dl.sourceforge.net/project/libuuid/libuuid-1.0.3.tar.gz && tar -xf libuuid-1.0.3.tar.gz && cd libuuid-1.0.3
./configure CC=aarch64-linux-gnu-gcc CXX=aarch64-linux-gnu-g++ --host=aarch64-linux-gnu --prefix=`pwd`/../lib
make -j && make install
cd ..

# https://www.python.org/ftp/python/3.11.4/Python-3.11.4.tar.xz
wget https://www.python.org/ftp/python/3.11.4/Python-3.11.4.tar.xz && tar -xf Python-3.11.4.tar.xz && cd Python-3.11.4
./configure --prefix=`pwd`/../Python-Host
make -j && make install


./configure \
    CC=aarch64-linux-gnu-gcc \
    CXX=aarch64-linux-gnu-g++ \
    --host=aarch64-linux-gnu \
    --build=x86_64-linux-gnu \
    --target=aarch64-linux-gnu \
    --with-build-python=`pwd`/../Python-Host/bin/python3.11 \
    --with-ensurepip=yes \
    --prefix=`pwd`/../PythonBinary \
    --enable-optimizations \
    --with-openssl=../lib \
    --disable-ipv6 \
    ac_cv_file__dev_ptmx=yes \
    ac_cv_file__dev_ptc=yes \
    CFLAGS="-I../lib/include" \
    LDFLAGS="-L../lib/lib"
    
   
make -j && make install
cd ..
tar -acf PythonBinary.tar.gz PythonBinary/

exit

mkdir Python-3.11-aarch64 && cd Python-3.11-aarch64
mkdir -p home/chi/.local/.
cp -r ../PythonBinary/. home/chi/.local/.
mkdir DEBIAN
cat << EOF > DEBIAN/control
Package: Python-3.11-aarch64
Version: 1.0.0
Architecture: aarch64
Maintainer: chi
Description: Python for aarch64
EOF
cd ..
dpkg -b Python-3.11-aarch64 Python-3.11-aarch64.deb
