# Drive-in 
_A Device Testing Theatre_

...kindof a dumb one. Just having some fun with long polling.

## How to:

1. Drop the .htaccess file and the "drive-in" folder into your web project's root directory. (If you already have an .htaccess file, drop the contents of this one into yours)

2. Open up any page in that web project that ends with a .html file extension. 

3. Do it again on another browser or device, and another one. As you navigate to other pages on that site, the devices will sync.

## License:

MIT

### Notes:

- You'll need an Apache web server with PHP.
- You'll need write permissions set on that txt file.
- You have to open files by their .html filename (even index.html).
- For the love of God, don't deploy a live site with this script enabled. :)

### Props:

This was inspired by a much cooler Node.js implementation by Chris Marstall, Creative Technologist at the Boston Globe. 