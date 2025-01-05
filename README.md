# tiled-pages

A Wordpress plugin that adds a tiled, clickable view of the set of pages on a site. 

## Usage

Add a shortcut block with the `[tiled_pages]` shortcode. The colour may optionally be specifed by the `colour` attribute (US spelling `color` also accepted), e.g. `[tiled_pages colour="#ff00ff"]` where the colour is specified by the hex value. A site for looking up the hex colour codes is [https://htmlcolorcodes.com/](https://htmlcolorcodes.com/). Optionally, the tiles may be sorted in ascending alphabetical order (using the page title) by specifying `order="asc"` or descending order by `order="desc"`.