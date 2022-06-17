# Simple Spoiler Shortcode WordPress plugin

A WordPress plugin to add to your pages a hidden text which is shown by click.

Plugin functionality
-

In any post/page wyou can use the following shortcode:

    [simple_spoiler title="TITLE" text="TEXT"]

The first "title" parameter value is the text that will be shown on the page at first. When user clicks on in this text it will be replaced with the second "text" parameter value and the user can see the hidden text.

The hidden text is base64 encoded and reversed to make it unreadable for bots and web-spiders. So it is the useful way to hide your E-mail address from bots but stay it accessible for users.

Example:

    [simple_spoiler title="Show" text="mail@mail.org"]


OpenSource
-
The plugin is OpenSource: you can see the source code on GitHub: https://github.com/Korchy/wordpress_simple_spoiler_shortcode

Installation
-
Install the plugin as usual.

Activate the plugin.

Now you can use the shortcode on your pages and posts.

Current version
-
1.0.0
