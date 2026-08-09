#!/bin/sh
set -e

# Web ルート内のログ書き込み先ディレクトリを起動時に作成し、書き込み権限を付与する
TARGET_DIR=/var/www/html/debugroom/answers
mkdir -p "$TARGET_DIR"
chmod -R 0777 "$TARGET_DIR"

# Apache を起動する
exec apache2-foreground
