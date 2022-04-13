# 📦 Xplora-File Server

## Running

Run `link.bat` script in terminal.

```
$ link.bat
```

## Settings

change these setting according to your requirements in
`php.ini` settings

Maximum allowed size for uploaded files.

```
upload_max_filesize=20M
```

Maximum size of POST data that PHP will accept.

```
post_max_size=20M
```

> **Note:** Make `upload_max_filesize` and `post_max_size` same.

Maximum number of files that can be uploaded via a single request

```
max_file_uploads=100
```

## File structure

File structure after running link script.

```
root
|-- index.php
|-- .htaccess
|-- app
|   |
|   |
```

### Thank You! 🙏
