# cheesy_gallery
TYPO3 Extension "cheesy_gallery"

This extension is a really simple gallery without bells and whistles. It is a media gallery for images and thus bells and whistles which are making sounds would be of no use anyways.

Simply install the extension via the extension manager and insert the cheesy gallery plugin on a page.

Then include the included static TypoScript template.

Now create a file collection on the page with the plugin. Choose type "static image" for the type of collection and add some images.

The gallery will display the selected images in the frontend.

Currently only static collections are implemented. The other types (folder, categories, custom) will echo an "TODO" message and exit.

Additional features for this gallery (except support for additional collection types) will get implemented as branches.

Currently there are the following features/branches:
 * feature-latest: Allows to show a list of latest images in all branches

 The aim of this extension is to keep it simple compared to other current galleries for TYPO3.