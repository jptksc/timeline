<?php include('./assets/helpers/functions.php'); ?>
<!DOCTYPE html> 
<html lang="en-US">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        
        <!-- Title & Description: Change the title and description to suit your needs. -->
        <title>The Timeline Template</title>
        <meta name="description" content="A minimalist timeline template.">
        
        <!-- Viewport Meta: Just taming mobile devices like iPads and iPhones. -->
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0"/>
        
        <!-- Google Fonts: The default font for this template. -->
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,900">
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Merriweather:400,300,700,900">
        
        <!-- Styles: The primary styles for this template. -->
        <link rel="stylesheet" type="text/css" href="assets/styles/normalize.css">
        <link rel="stylesheet" type="text/css" href="assets/styles/main.css?ver=1.0">
        <link rel="stylesheet" type="text/css" href="assets/styles/responsive.css?ver=1.0">
        
        <!-- Favicon: Change to whatever you like within the “assets/images” folder. -->
        <link rel="shortcut icon" type="" href="assets/images/favicon.png">
        
        <!-- Required Scripts: Not too much needed for this template. -->
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.0.3.min.js"></script>
        <script type="text/javascript" src="assets/scripts/main.js"></script>
    </head>

    <body>
        <!-- Timeline: Your timeline is generated automatically (check out the README for more info). -->
        <section class="row" id="timeline">
            <?php echo($content); ?>
        </section>
        
        <!-- The Beginning: The beginning of your timeline (don’t delete this). -->
        <section class="row" id="beginning">
        </section>
        
        <!-- Footer Bar: Update your tagline and menu below. -->
        <footer class="row" id="footer" >
            <img src="assets/images/profile.jpg">
            
            <blockquote><strong>Jason Schuller</strong><span> | </span>Designer and maker of things.</blockquote>
            
            <nav>
                <a class="open" href="#about">About</a>
                <a class="open" href="#contact">Contact</a>
                <a class="open" href="#follow">Follow</a>
                <a class="open" href="#subscribe">Subscribe</a>
                <a class="icon beginning scroll" href="#beginning"></a>
            </nav>
        </footer>
        
        <!-- About Panel: Update your “about” text. -->
        <section class="row panel closed" id="about">
            <a class="icon close" href="#about"></a>
            
            <div class="content">
                <p>Hi, I'm Jason Schuller, and I design and make websites. This is Timeline, a minimalist site template for publishing life, work and everything in-between. There are so many different outlets available for publishing text, photos, video and more — Timeline allows you to display and publish links to those things in a simple and elegant way.</p>
                <img class="signature" src="assets/images/signature.png" />
            </div>
        </section>
        
        <!-- Contact Panel: Update your “contact” text and information. -->
        <section class="row panel closed" id="contact">
            <a class="icon close" href="#contact"></a>
            
            <div class="content">
                <p>I’m available for design and development work starting at $6,000. Or, if you just want to say hello, I’d love to hear from you. In either case, feel free to <a href="mailto:hi@jason.sc">email me here</a>. I receive a lot of email — keep it short and you’ll get a faster reply.</p>
            </div>
        </section>
        
        <!-- Follow Panel: Update your social links. -->
        <section class="row panel social closed" id="follow">
            <a class="icon close" href="#follow"></a>
            
            <a class="link icon facebook" href="https://facebook.com" target="_blank"></a>
            <a class="link icon twitter" href="https://twitter.com/jschuller" target="_blank"></a>
            <a class="link icon instagram" href="https://instagram.com" target="_blank"></a>
        </section>
        
        <!-- Subscribe Panel: Your newsletter text and form (if you have one). -->
        <section class="row panel closed" id="subscribe">        
            <div id="loading">
                <span class="status icon"></span>
            </div>
            
            <a class="icon close" href="#subscribe"></a>
            
            <div class="content">
                <p>Get an honest perspective on entrepreneurship, creativity, personal growth and mindfulness living when you sign up for my weekly newsletter.</p>
            
                <!-- Subscription Form: Configure your MailChimp settings within settings.php. -->
                <form class="row" id="mailchimp" action="assets/helpers/post-subscribe.php" method="post">
                    <input type="email" name="email" id="email" placeholder="you@youremail.com">
                    <button type="submit" class="icon submit button"></button>
                </form>
            </div>
        </section>
        
        <!-- Video Panel: The home for all your video posts. -->
        <section class="row panel closed video" id="video">
            <a class="icon stop" href="#video"></a>
            
            <div class="video">
                <div class="embed">
                <!-- Video Embeds: Videos are embedded here automatically. -->
                </div>
            </div>
        </section>
        
        <!-- Photo Panel: The home for all your photo posts. -->
        <section class="row panel closed photo" id="photo">
            <a class="icon done" href="#photo"></a>
            
            <div class="photo">
            </div>
        </section>
    </body>
</html>