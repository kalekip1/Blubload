Blubload
========

Upload images with PDO using BLOB.

**Note:** This is a basic start for making an image uploading service using PDO. Images are directly saved in the database (BLOB). *This is in no way ready to go for production.*

**To-do:**
- Improve object-oriented design
- Improve security (validating, encoding, etc.)(!)
- Reading images with one GET should not be possible. Bots will be able to iterate through every image by adding 1 to the current GET. A second parameter is suggested.
