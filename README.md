# cheesy_gallery
TYPO3 Extension "cheesy_gallery"

This extension is a really simple gallery without bells and whistles. It is a media gallery for images and thus bells and whistles which are making sounds would be of no use anyways.

Simply install the extension via the extension manager and insert the cheesy gallery plugin on a page.

Then include the static TypoScript template shipped along with the extension.

Now create a file collection on the page with the plugin. Choose type "static image" for the type of collection and add some images.

The gallery will display the selected images in the frontend.

Currently only static and folder collections are implemented. The other types (categories, custom) will echo an "TODO" message and exit.

Additional features for this gallery (except support for additional collection types) will get implemented as branches.

Currently there are the following features/branches:
 * feature-latest: Allows to show a list of latest images in all branches of the page tree.
   This allows to add a "latest images box" to a sidebar or header/footer of a website.

 The aim of this extension is to keep it simple compared to other current galleries for TYPO3.

Changelog:
 * 2018-06-21: Make the extension compatible to TYPO3 9.2.
 * 2018-06-22: Implemented display of "folder" collections.
 * 2018-06-22: Updated copyright messages.

