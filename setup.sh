#!/bin/bash

echo "Linking files..."
ln index.php ../index.php
ln .htaccess ../.htaccess
touch ./data/star.json
echo "All Done!"
