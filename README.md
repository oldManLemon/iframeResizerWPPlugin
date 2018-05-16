# iframeResizerWPPlugin
A simple, slightly dodgy wp plugin to add iframeResizer to internal wordpress site

## iframe-resizer
Taken from https://github.com/davidjbradshaw/iframe-resizer who is the genius who first created this code. All I have done here
is wrapped it into a slightly dodgy wordpress plugin so that it is loaded on every front end page. 


In order to get it to work on your iframes you will still need to initialize the content below with code snips. example:


    <script>iFrameResize({ log: true, }, '#frameZero')</script>
    <script>iFrameResize({ log: true, }, '#frameOne')</script>
    <script>iFrameResize({ log: true, }, '#frameTwo')</script> 

Adding this to the bottom of your page will call the script correctly to look at the iframes.  Log can be set true or false. False is best once it is is working as expected. 

