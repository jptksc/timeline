# Timeline
A simple flat-file website solution for publishing text, quotes, videos, photos and links.

![Alt text](screenshot.jpg?raw=true)

## Description

With so many outlets available for sharing text and media (photos & video), I wanted to create a simple self-hosted solution that doesn’t require an account, a complex CMS or even a database. Timeline has been built to read a folder of simple text files and display the contents and linked assets of those files in a vertical timeline. You can publish several different content types including short (paragraph-long) bursts of text, links, videos via YouTube or Vimeo, or even photos. Timeline requires a PHP compatible server to work, but that’s about it... just upload and start posting your content (no setup).

## Setup

1. Add your MailChimp API and list ID within "settings.php".
2. Modify your site text within "index.php".
4. Upload to your server.

## Posting Content

You can post text, links quotes, photos and videos with the Timeline template. Posting content to Timeline is super easy using simple text files. The “content” folder includes sample post files for each post type, but continue reading for more details below:

1. Create a new text file using the editor of your choice.
2. On the 1st line, add a title.
3. On the 3rd line, add a date (e.g. “08 April 2015”).
4. On the 5th line, add your text (only one line of text is supported for now).
5. If you’re sharing a link, you can add a link title on the 7th line followed by the link URL on the 8th.

Timeline knows what type of post it is by the prefix you give your text file name. For instance, a quote would be named something like “quote-about-something.txt”. Use the same method for all post types including:

- Text: text-any-post-name.txt
- Link: link-any-post-name.txt
- Quote: quote-any-post-name.txt
- Photo: photo-any-post-name.txt

## Photo Posts

For photo posts, you need to add a “jpg” with the same name as your post file. Here’s an example of how that might look:

- photo-any-post-name.txt
- photo-any-post-name.jpg

## Video Posts

Video posts are slightly different. Currently, Timeline supports YouTube and Vimeo embeds (I’m working on support for more). Start out by creating a new text file as explained above including a title, date and text. Before you save your file, grab the video ID for the video you would like to embed (usually the last part of the URL on YouTube or Vimeo). Prefix your file name with the video service you’re using (e.g. “youtube-”) and then add your video ID. So, if you were going to embed a YouTube video with an ID of “5Qo0Q_91ZXg”, you file would look like this:

- youtube-5Qo0Q_91ZXg.txt

When you refresh your site, a thumbnail image will automatically be generated for you.

## Background Images

Photo and video posts support background images. To create a background image, simply add a new image to your content folder using the same file name as your post with “-background.jpg” at the end. You will end up with 3 files like this:

- photo-any-post-name.txt
- photo-any-post-name.jpg
- photo-any-post-name-background.jpg

The same structure works for video posts as well.

## Services

If you need help developing the functionality you need for your own site, I'm available for hire to help you with whatever customization or implementation services you might need. To get started, just send me an email (jason@circa75.co).

## Version 1.0

- NEW: Initial release.

## License

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.