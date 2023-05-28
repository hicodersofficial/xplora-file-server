#!/bin/bash

echo "Linking files..."
touch ./data/star.json
echo "[]" > ./data/star.json
ln index.php ../index.php
ln .htaccess ../.htaccess
echo "All Done!"
