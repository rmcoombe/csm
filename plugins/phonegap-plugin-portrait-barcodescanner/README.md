# PhoneGap Plugin BarcodeScanner
================================

Cross-platform BarcodeScanner for Cordova / PhoneGap.

Follows the [Cordova Plugin spec](http://cordova.apache.org/docs/en/5.0.0/plugin_ref_spec.md), so that it works with [Plugman](https://github.com/apache/cordova-plugman).

## Installation

    
This requires phonegap 5.0+ ( current stable v3.0.0 )

    phonegap plugin add phonegap-plugin-portrait-barcodescanner

It is also possible to install via repo url directly ( unstable )

    phonegap plugin add https://github.com/chen6516/cordova-zxing-portrait.git

### Supported Platforms

- Android(only chinese)
- iOS

Note: the Android source for this project includes an Android Library Project.
plugman currently doesn't support Library Project refs, so its been
prebuilt as a jar library. Any updates to the Library Project should be
committed with an updated jar.

## Using the plugin ##
The plugin creates the object `cordova/plugin/BarcodeScanner` with the method `scan(success, fail)`. 

The following barcode types are currently supported:
### Android

* QR_CODE
* DATA_MATRIX
* UPC_E
* UPC_A
* EAN_8
* EAN_13
* CODE_128
* CODE_39
* CODE_93
* CODABAR
* ITF
* RSS14
* PDF417
* RSS_EXPANDED

### iOS

* QR_CODE
* DATA_MATRIX
* UPC_E
* UPC_A
* EAN_8
* EAN_13
* CODE_128
* CODE_39
* ITF

### Windows8

* UPC_A
* UPC_E
* EAN_8
* EAN_13
* CODE_39
* CODE_93
* CODE_128
* ITF
* CODABAR
* MSI
* RSS14
* QR_CODE
* DATA_MATRIX
* AZTEC
* PDF417

### Windows Phone 8

* UPC_A
* UPC_E
* EAN_8
* EAN_13
* CODE_39
* CODE_93
* CODE_128
* ITF
* CODABAR
* MSI
* RSS14
* QR_CODE
* DATA_MATRIX
* AZTEC
* PDF417

### BlackBerry 10
* UPC_A
* UPC_E
* EAN_8
* EAN_13
* CODE_39
* CODE_128
* ITF
* DATA_MATRIX
* AZTEC

`success` and `fail` are callback functions. Success is passed an object with data, type and cancelled properties. Data is the text representation of the barcode data, type is the type of barcode detected and cancelled is whether or not the user cancelled the scan.

A full example could be:
```
   cordova.plugins.barcodeScanner.scan(
      function (result) {
          alert("We got a barcode\n" +
                "Result: " + result.text + "\n" +
                "Format: " + result.format + "\n" +
                "Cancelled: " + result.cancelled);
      }, 
      function (error) {
          alert("Scanning failed: " + error);
      }
   );
```

## Encoding a Barcode ##

The plugin creates the object `cordova.plugins.barcodeScanner` with the method `encode(type, data, success, fail)`. 

Supported encoding types:

* TEXT_TYPE
* EMAIL_TYPE
* PHONE_TYPE
* SMS_TYPE

```
A full example could be:

   cordova.plugins.barcodeScanner.encode(cordova.plugins.barcodeScanner.Encode.TEXT_TYPE, "http://www.nytimes.com", function(success) {
            alert("encode success: " + success);
          }, function(fail) {
            alert("encoding failed: " + fail);
          }
        );
```

## Windows8 quirks ##
Windows 8 implementation currently doesn't support encode functionality.

## Windows Phone 8 quirks ##
Windows Phone 8 implementation currently doesn't support encode functionality.

## BlackBerry 10 quirks
BlackBerry 10 implementation currently doesn't support encode functionality.
Cancelling a scan on BlackBerry 10 is done by touching the screen.

## Thanks on Github ##

So many -- check out the original [iOS](https://github.com/phonegap/phonegap-plugins/tree/DEPRECATED/iOS/BarcodeScanner),  [Android](https://github.com/phonegap/phonegap-plugins/tree/DEPRECATED/Android/BarcodeScanner) and 
[BlackBerry 10](https://github.com/blackberry/WebWorks-Community-APIs/tree/master/BB10-Cordova/BarcodeScanner) repos.

## Licence ##

The MIT License

Copyright (c) 2010 Matt Kane

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.


the barcodescanner portrait cordova plugin
二维码竖屏扫描cordova插件
===============================================================
Modify from https://github.com/phonegap/phonegap-plugin-portrait-barcodescanner and  https://github.com/xiaowei4895/zxing-android-portrait.git, the detail see below.
1.Only keep android and ios plugin
2.Modify switch to if else part in xiaowei4895 source code
3.Only keep chinese language, other is removed, if u need others please contact me or check out up github source code to rebuild by yourself

How to modify up source code by yourself, it's my way
1. Fetch up two source code
2. Modify switch to if else part in xiaowei4895 java source code
3. Compile xiaowei4895 project to aar package(There have a decompression code in android/build/intermediates/exploded-aar/zxing-debug)
4. Modify phonegap-plugin-portrait-barcodescanner plugin.xml, to see my modifyed in this project
5. Replace the plugin zxing-debug.aar to newest and reinstall this plugin

Warning:
When installed this plugin to building your project maybe warning the android sdk conflict ,
please modify androidManifest minSdk version code to keep same or in 'uses-sdk' and this node attribute `tools:overrideLibrary="com.google.zxing.client.android"`

