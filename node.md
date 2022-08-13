যে কোনো সমস্যার জন্যঃ https://codex.wordpress.org/Main_Page

============================================================================================
১ - প্রাথমিক বিষয় সমূহ
============================================================================================

১.১ - ওয়ার্ডপ্রেস, কি এবং কেন
১.২ - এই কোর্স এর বেনিফিটস
১.৩ - কিভাবে এফেক্টিভলি শিখব

১.৪ - প্রয়োজনীয় টুলস
    AMPPS – https://www.ampps.com 
    XAMPP – https://www.apachefriends.org 

    FileZilla – https://filezilla-project.org/ 

    Pantheon – https://pantheon.io 
    Flywheel – https://getflywheel.com 

    Visual Studio Code – https://code.visualstudio.com/ 
    PhpStorm – https://www.jetbrains.com/phpstorm/ 
    Sublime – https://www.sublimetext.com/ 
    Atom – https://atom.io/ 


১.৫ - AMPPS নিয়ে বিস্তারিত    
১.৬ - পিএইচপিস্টর্ম নিয়ে কিছুমিছু
১.৭ - ভিজ্যুয়াল স্টুডিও কোড নিয়ে একটু কথা
১.৮ - ওয়ার্ডপ্রেস টার্মিনোলজি
১.৯ - হুক নিয়ে আলোচনা

১.১০ - নতুন একটা ডেভেলপমেন্ট এনভায়রনমেন্ট - লোকাল বাই ফ্লাইহুইল
    Download From: https://local.getflywheel.com 
    
    
============================================================================================
২ - অ্যাডমিন প্যানেলের সাথে পরিচিতি
============================================================================================
২.১ - পরিচিতি এবং পোস্ট সেকশন
২.২ - অ্যাডমিন প্যানেল - মিডিয়া
২.৩ - অ্যাডমিন প্যানেল - থিমস এবং উইজেটস
২.৪ - অ্যাডমিন প্যানেল - মেনু
২.৫ - অ্যাডমিন প্যানেল - প্লাগইনস
২.৬ - ইউজার, রোল এবং ক্যাপাবিলিটিজ
২.৭ - সেটিংস

============================================================================================
৩ - থিম ডেভেলপমেন্টের সাথে পরিচয়
============================================================================================

৩.১ - থিম অ্যানালাইসিস

৩.২ - বুটস্ট্র‍্যাপিং - একটা ব্ল্যাঙ্ক থিম তৈরী করতে গেলে যা যা লাগে
Index.php
Style.css


এই লিঙ্ক থেকে কি লিখতে হবে তার ধারন পাওয়া যাবেঃ https://developer.wordpress.org/themes/basics/main-stylesheet-style-css/ 

কি কি tags লেখা যাবে তা এখান থেকে ধারনা পাওয়া যাবেঃ https://make.wordpress.org/themes/handbook/review/required/theme-tags/ 

/*
Theme Name: Alpha (থিম এর নাম ইউনিক হতে হবে। wordpress theme directory তে এক নামে ২ টা থিম থাকতে পারবে না) 
Theme URI: কোথা থেকে থিমটি download করা যাবে।
Author: Md. Mehedi Hassan
Author URI: https://mistermehedi.com/  
Description: My First Theme
Tags: https://make.wordpress.org/themes/handbook/review/required/theme-tags/ like: blog,education
Version: 1.3
Requires at least: 5.0 
Tested up to: 5.4
Requires PHP: 7.0
License: GNU General Public License v2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Text Domain: text domain একটাই হয়। যেই directory তে theme টি রাখা হয় সেই নাম টি ই text domain হিসেবে রাখা হয়। যেমন এই ক্ষেত্রে alpah.
This theme, like WordPress, is licensed under the GPL.
Use it to make something cool, have fun, and share what you've learned with others.
*/

 Functions.php


সাধারণত যেসব functions সরাসরি output echo করে দেয় সেই fucntions এর আগে get বসালে সেই functions output returns করে। যেমনঃ bloginfo -> get_bloginfo()
Theme install করার সাথে সাথে যেই functions গুলো আমরা চাই load হবে সেই functions গুলো নিচের after_setup_theme hook এর মধ্যে লিখতে হবে। যেমনঃ

add_action( "after_setup_theme", "alpha_bootstrapping" );

function alpha_bootstrapping() {
    load_theme_textdomain( "alpha" );
    add_theme_support( "post-thumbnails" );
    add_theme_support( "title-tag" );

    $alpha_custom_logo_defaults = array(
        "width"     => '100',
        "height"    => '100'
    );
    add_theme_support("custom-logo", $alpha_custom_logo_defaults);

    add_theme_support("custom-background");

    $alpha_custom_header_details = array (
        'header-text' => true,
        'default-text-color' => '#222',
        'width' => 1200,
        'height' => 600,
        'flex-height' => true,
        'flex-width'  => true
    );
    add_theme_support( "custom-header", $alpha_custom_header_details );

    register_nav_menu( "topmenu", __( "Top Menu", "alpha" ) );
    register_nav_menu( "footermenu", __( "Footer Menu", "alpha" ) );
}




৩.৩ - লুপের সাথে পরিচয়
    FakerPress plugin By Gustavo Bordoni - এটা দিয়ে Dummy পোষ্ট তৈরি করা যায়। 
<?php
if ( have_posts() ) {
    while ( have_posts() ) {
        the_post();
        //
        // Post Content here
        //
    } // end while
} // end if
?>



৩.৪ - একটা বেসিক HTML টেমপ্লেটকে ওয়ার্ডপ্রেস থিমে কনভার্সন শুরু - এইচটিএমএল টেমপ্লেটটি ডাউনলোড করুন এখান থেকে https://www.dropbox.com/s/l8mf57ypnenvs8h/template.html.zip?dl=1 

৩.৫ - থিমের বুটস্ট্র্যাপিং - এইচটিএমএল টেমপ্লেটটি ডাউনলোড করুন এখান থেকে https://www.dropbox.com/s/l8mf57ypnenvs8h/template.html.zip?dl=1 

৩.৬ - পোস্টের রিয়াল কনটেন্ট দেখানো এবং ডেট ফরম্যাট - আজকের টিউটোরিয়ালে দেখানো ওয়ার্ডপ্রেস থিমটার সোর্স কোড ডাউনলোড করুন এখান থেকে: https://github.com/LearnWithHasinHayder/wp-theme-alpha/releases এখানে গিয়ে “May19 Release” এর নিচে সোর্স (জিপ) এ ক্লিক করুন। ডাউনলোড করুন, এবং আনজিপ করে ফোল্ডারটি রিনেম করে দিন “alpha” নামে, এরপর ফোল্ডারটি কপি করুন। তারপর আপনার ওয়ার্ডপ্রেসের ভেতরে wp-content/themes/ এই ডিরেক্টরিতে গিয়ে ফোল্ডারটি পেস্ট করুন আর। যারা অ্যাডভেঞ্চারাস, তারা টার্মিনালে আপনার ওয়ার্ডপ্রেসের থিম ডিরেক্টরিতে গিয়ে টার্মিনালে কমান্ড দিন
git clone https://github.com/LearnWithHasinHayder/wp-theme-alpha.git alpha
ব্যাস, এরপর অ্যাডমিন প্যানেলের অ্যাপিয়ারেন্স মেনুর থিম সাবমেনু থেকে আলফা থিমটি অ্যাক্টিভেট করে দিন

the_title();
the_author();
the_date();
if(has_post_thumbnail()){
    the_post_thumbnail('large', array("class"=>"img-fluid"));
}
the_content();
the_excerpt();

Formatting Date and Time : https://wordpress.org/support/article/formatting-date-and-time/ 


    
৩.৭ - পোস্টের ট্যাগ এবং পেজিনেশন
    আজকের টিউটোরিয়ালে দেখানো ওয়ার্ডপ্রেস থিমটার সোর্স কোড ডাউনলোড করুন এখান থেকে - https://github.com/LearnWithHasinHayder/wp-theme-alpha/releases এখানে গিয়ে “May19 Release” এর নিচে সোর্স (জিপ) এ ক্লিক করুন। ডাউনলোড করুন, এবং আনজিপ করে ফোল্ডারটি রিনেম করে দিন “alpha” নামে, এরপর ফোল্ডারটি কপি করুন। তারপর আপনার ওয়ার্ডপ্রেসের ভেতরে wp-content/themes/ এই ডিরেক্টরিতে গিয়ে ফোল্ডারটি পেস্ট করুন । আর যারা অ্যাডভেঞ্চারাস, তারা টার্মিনালে আপনার ওয়ার্ডপ্রেসের থিম ডিরেক্টরিতে গিয়ে টার্মিনালে কমান্ড দিন
git clone https://github.com/LearnWithHasinHayder/wp-theme-alpha.git alpha
ব্যাস, এরপর অ্যাডমিন প্যানেলের অ্যাপিয়ারেন্স মেনুর থিম সাবমেনু থেকে আলফা থিমটি অ্যাক্টিভেট করে দিন

পোস্টের ট্যাগ Display করা
echo get_the_tag_list(" <ul class='list-unstyled'><li> "," </li><li> "," </li></ul> ");
পেজিনেশন Display করা
the_posts_pagination( array(
    'mid_size'  => 2,
    'prev_text' => __( 'Back', 'textdomain' ),
    'next_text' => __( 'Onward', 'textdomain' ),
) );


    
৩.৮ - পোস্টের সিংগেল ভিউ এবং থিমের কোড আপডেট

<h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>



৩.৯ - the_date() ফাংশন এর ছোট্ট একটা ঝামেলা
    Wordpress এ the_date() ব্যাবহার করলে একই date এ একাধিক পোস্ট থাকলে সুধু 1st টা show করবে। echo get_the_date(); ব্যাবহার করলে এই সমস্যা থাকবে না।  


৩.১০ - সিংগেল পোস্ট এর জন্য নতুন টেমপ্লেট - single.php


৩.১১ - ডিফল্ট টেমপ্লেট ফাইল নিয়ে কিছু কথা
    emplate File সম্পর্কে ধারনা পাওয়ার জন্যঃ https://developer.wordpress.org/themes/basics/template-files/


৩.১২ - সিংগেল পোস্ট ভিউতে কমেন্ট ফর্ম দেখানো
Single Page এ comments form দেখানোর জন্যঃ
<?php if(comments_open()):  ?>
    <div class="col-md-10 offset-md-1">
        <?php comments_template(); ?>
    </div>
<?php endif; ?>


    

৩.১৩ - বড় একটা থিম ফাইলকে ভেঙে ছোট ছোট ফাইলে নেয়া
<?php get_header(); ?>
<?php get_footer(); ?>
<?php get_template_part("hero"); ?>
<a href="<?php echo site_url(); ?>"> <?php bloginfo("name"); ?> </a>



৩.১৪ - get_template_part নিয়ে বিস্তারিত আলোচনা (ইম্পর্ট্যান্ট)
    get_template_part সবসময় theme এর root directory পায়। সেই জন্য যদি theme root directory এর মধ্যে কোন folder থাকে এবং এবং তার মধ্যে দুই টি file থাকে তবে তার লিংক করার জন্য সবসময় root থেকে ই শুরু করতে হবে।
যেমনঃ 
themeName -> folderName -> FileNameOne.php
themeName -> folderName -> FileNameTwo.php

তখন যদি FileNameTwo.php থেকে FileNameone.php কে লিংক করতে হয় তবেঃ 
get_template_part(“folderName/FileNameOne”)
এভাবে লিংক করতে হবে। অর্থাৎ theme name root directory ধরে path শুরু করতে হবে।

আবার ফাইলের নামের মাঝে হাইফেন থাকলে ২ ভাবে লিংক করার সময় লেখা যায়। যেমন ফাইলের নামঃ
themeName -> folderName -> file-name-one.php
themeName -> folderName -> file-name-two.php
তখন ২ ভাবে লিখতে পারবো। যেমনঃ
get_template_part(“folderName/file-name-one”)
বা
get_template_part(“folderName/file”,”name”,”one”);


৩.১৫ - get_template_part, include এবং requireএর মাঝে পার্থক্য - কোনটা কখন ব্যবহার করব
    শুধু মাত্র library বা functions এই জাতীয় file গুলো আনবো require বা require_once function ব্যাবহার করে যদি প্রয়োজন হয় এবং template জাতীয় file সবসময় add করবো get_template_part দিয়ে। include কখনোই ব্যাবহার করবো না। 


৩.১৬ - সিঙ্গেল পোস্ট ভিউতে পোস্ট নেভিগেশন
next_post_link();
echo "<br/>";
previous_post_link();



৩.১৭ - উইজেট এরিয়া রেজিস্টার করা এবং সিঙ্গেল পোস্ট ভিউ তে সাইডবার দেখানো
    আজকের টিউটোরিয়ালে দেখানো ওয়ার্ডপ্রেস থিমটার সোর্স কোড ডাউনলোড করুন এখান থেকে https://github.com/LearnWithHasinHayder/wp-theme-alpha/releases

    এখানে গিয়ে “May 21 Release” এর নিচে সোর্স (জিপ) এ ক্লিক করুন। ডাউনলোড করুন, এবং আনজিপ করে ফোল্ডারটি রিনেম করে দিন “alpha” নামে, এরপর ফোল্ডারটি কপি করুন। তারপর আপনার ওয়ার্ডপ্রেসের ভেতরে wp-content/themes/ এই ডিরেক্টরিতে গিয়ে ফোল্ডারটি পেস্ট করুন । আর যারা অ্যাডভেঞ্চারাস, তারা টার্মিনালে আপনার ওয়ার্ডপ্রেসের থিম ডিরেক্টরিতে গিয়ে টার্মিনালে কমান্ড দিন
    git clone https://github.com/LearnWithHasinHayder/wp-theme-alpha.git alpha
    cd alpha
    git checkout may21

    যারা অলরেডি গিট ক্লোন করেছেন, তারা নতুন করে ক্লোন না করে নিচের কমান্ড টি দিন

    cd wp-content/theme/alpha
    git fetch –all
    git checkout may21

    ব্যাস, এরপর অ্যাডমিন প্যানেলের অ্যাপিয়ারেন্স মেনুর থিম সাবমেনু থেকে আলফা থিমটি অ্যাক্টিভেট করে দিন (যদি অ্যাক্টিভেট না করা থাকে)

widgets area তে widgets দেখানোর জন্য প্রথমে functions.php তে নিছের কোড লিখতে হবে।
function alpha_sidebar(){
register_sidebar(    
    array(
        'name'          => __( 'Single Post Sidebar', 'alpha' ),
        'id'            => 'sidebar-1', // Id should be uinque when you register a new sidebar.
        'description'   => __('Right Sidebar', 'alpha'),
        'class'         => 'sidebar-1',
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    )
);          
}
add_action("widgets_init", "alpha_sidebar");

এরপর যেখানে widgets show করতে চাই সেখানে নিচের মত করে লিখতে হবে।
<?php
if(is_active_sidebar("sidebar-1")){
    dynamic_sidebar("sidebar-1");
}
?>

    
৩.১৮ - ফুটারে উইজেট এরিয়ার উইজেটগুলো দেখানো

৩.১৯ - পাসওয়ার্ড প্রটেকটেড পোস্ট ম্যানেজ করা
blog page এ নিচের মত করে post password protected করতে পারিঃ
if(!post_password_required()){
    the_excerpt();
}else{
    echo get_the_password_form();   
}
অথবা নিচের মত করে functions.php - file এ function লিখে, blog page এ শুধু the_excerpt(); ব্যবহার করে post password protected করতে পারি।
functions.php - file এ লিখতে হবেঃ
function alpha_the_excerpt($excerpt){
    if(!post_password_required()){
        return $excerpt;
    }else{
        echo get_the_password_form();   
    }
}
add_filter("the_excerpt", "alpha_the_excerpt");

এবং blog page এ লিখতে হবেঃ
the_excerpt();
protected post এর title এ যে Protected লেখা আসে তা পরিবর্তন করার জন্য নিচের functions, functions.php file এ লিখতে হবে।
function alpha_protected_title_change(){
    return "%s";
}
add_filter("protected_title_format", "alpha_protected_title_change");



৩.২০ - ইম্পর্ট্যান্ট - মেনু লোকেশন তৈরী করা এবং মেনু ডিসপ্লে করা, সাথে মেনু আইটেমে এক্সট্রা সিএসএস ক্লাস যোগ করা
    আজকের টিউটোরিয়ালে দেখানো ওয়ার্ডপ্রেস থিমটার সোর্স কোড ডাউনলোড করুন এখান থেকে - https://github.com/LearnWithHasinHayder/wp-theme-alpha/releases 

    এখানে গিয়ে “May 22 Release” এর নিচে সোর্স (জিপ) এ ক্লিক করুন। ডাউনলোড করুন, এবং আনজিপ করে ফোল্ডারটি রিনেম করে দিন “alpha” নামে, এরপর ফোল্ডারটি কপি করুন। তারপর আপনার ওয়ার্ডপ্রেসের ভেতরে wp-content/themes/ এই ডিরেক্টরিতে গিয়ে ফোল্ডারটি পেস্ট করুন। আর যারা অ্যাডভেঞ্চারাস, তারা টার্মিনালে আপনার ওয়ার্ডপ্রেসের থিম ডিরেক্টরিতে গিয়ে টার্মিনালে কমান্ড দিন

    git clone https://github.com/LearnWithHasinHayder/wp-theme-alpha.git alpha
    cd alpha
    git checkout may22

    যারা অলরেডি গিট ক্লোন করেছেন, তারা নতুন করে ক্লোন না করে নিচের কমান্ড টি দিন

    cd wp-content/theme/alpha
    git fetch –all
    git checkout may22

    ব্যাস, এরপর অ্যাডমিন প্যানেলের অ্যাপিয়ারেন্স মেনুর থিম সাবমেনু থেকে আলফা থিমটি অ্যাক্টিভেট করে দিন (যদি অ্যাক্টিভেট না করা থাকে)

1. মেনু লোকেশন তৈরী করা
    register_nav_menu("topmenu", __("Top Menu","alpha"));
    register_nav_menu("footermenu", __("Footer Menu","alpha"));
2. মেনু ডিসপ্লে করা
    <?php
        wp_nav_menu(
            array(
                'theme_location' => 'topmenu',
                'menu_id' => 'topMenuContainer', // menu এর ul এ এই id বসবে
                'menu_class' => 'list-inline text-center' // menu এর ul এ এই class বসবে
            )
        );
    ?>
    // For Details: https://developer.wordpress.org/reference/functions/wp_nav_menu/
3. মেনু আইটেমে এক্সট্রা সিএসএস ক্লাস যোগ করা
    function alpha_menu_item_class($classes, $item ){
        $classes[] = 'list-inline-item'; // menu এর li এ এই class বসবে
        return $classes;
    }
    add_filter('nav_menu_css_class', 'alpha_menu_item_class', 10, 2);
    // For details: https://developer.wordpress.org/reference/hooks/nav_menu_css_class/


 
৩.২১ - থিমে এক্সটার্নাল জাভাস্ক্রিপ্ট ফাইল এনকিউ করা এবং লাইটবক্স/পপআপ দেখানো
    To download the code – go to here https://github.com/LearnWithHasinHayder/wp-theme-alpha/releases/tag/may23-popup 
    and download the zip file. Extract it, rename as “alpha” and paste in your wp-content/themes/ folder built in wordpress javascript library: https://developer.wordpress.org/reference/functions/wp_enqueue_script/
    Featherlight: https://noelboss.github.io/featherlight/

built in wordpress javascript library: https://developer.wordpress.org/reference/functions/wp_enqueue_script/ 
Featherlight: https://noelboss.github.io/featherlight/ 
এক্সটার্নাল জাভাস্ক্রিপ্ট ফাইল এনকিউ করাঃ

wp_enqueue_script("featherlight-js", "//cdn.jsdelivr.net/npm/featherlight@1.7.14/release/featherlight.min.js", array("jquery"), "0.0.1", true );

wp_enqueue_script("alpha-mina", get_theme_file_uri("/assets/js/main.js"), array("jquery", "featherlight-js"), "0.0.1", true);
লাইটবক্স/পপআপ দেখানোঃ
if(has_post_thumbnail()){
    $thembnail_url = get_the_post_thumbnail_url(null, "large");
    printf('<a href="%s" data-featherlight="image">', $thembnail_url);
    the_post_thumbnail('large', array("class"=>"img-fluid"));
    echo "</a>";
}
jQuery এর দ্বারা লাইটবক্স/পপআপ দেখানোঃ

Wordpress Template code:
if(has_post_thumbnail()){
    echo '<a class="popup" href="#" data-featherlight="image">';
    the_post_thumbnail('large', array("class"=>"img-fluid"));
    echo "</a>";
}

jQuery code:
$(document).ready(function(){
    $(".popup").each(function(){
        var image = $(this).find("img").attr("src");
        $(this).attr("href", image);
    });
});



৩.২২ - ইনটার্নাল জাভাস্ক্রিপ্ট ফাইল এনকিউ করা এবং ডিপেন্ডেন্সি নিয়ে আলোচনা
    To download the code – go to here https://github.com/LearnWithHasinHayder/wp-theme-alpha/releases/tag/may23-popup-jquery and download the zip file. Extract it, rename as “alpha” and paste in your wp-content/themes/ folder

Old version: 
wp_enqueue_script("alpha-mina", get_template_directory_uri()."/assets/js/main.js", array("jquery"), "0.0.1", true);
New version(start version-4.7): 
wp_enqueue_script("alpha-mina", get_theme_file_uri("/assets/js/main.js"), array("jquery"), "0.0.1", true);
wp_enqueue_style("bootstrap-css", get_theme_file_uri("/assets/css/bootstrap.css"), null, "0.0.1", true);



৩.২৩ - থিমের স্ক্রিপ্ট এবং স্টাইলশিট ফাইলগুলোর ক্যাশ বাস্টিং
    To download the code – go to here https://github.com/LearnWithHasinHayder/wp-theme-alpha/releases/tag/may23-cache-busting 
    and download the zip file. Extract it, rename as “alpha” and paste in your wp-content/themes/ folder

থিমের url এ development mood এ এক version ও live mood এ অন্য version ব্যবহার করা।
Functions.php তে নিচের condition টি লিখতে হবে।

if(site_url() == "http://localhost/wordpress-theme-development/wtd"){
    define("VERSION", time());
}else{
    define("VERSION", wp_get_theme()->get("Version"));
}


এরপর functions.php তে নিচের মত version add করতে হবে।
wp_enqueue_style("alpha", get_stylesheet_uri(), null, VERSION );



৩.২৪ - সিঙ্গেল পেজ ভিউ এবং পেজ টেমপ্লেটের সাথে পরিচয় (খুবই ইম্পর্ট্যান্ট)
    To download the code – go to here https://github.com/LearnWithHasinHayder/wp-theme-alpha/releases/tag/may23-page-templates 
    and download the zip file. Extract it, rename as “alpha” and paste in your wp-content/themes/ folder
Page এ dynamic ভাবে background image হিসেবে thumbnail image use করা
<?php
$alpha_feat_image = get_the_post_thumbnail_url(null,"large");
?>

<div class="header page-header" style="background-image: url(<?php echo $alpha_feat_image;?>);">
</div>


কোন page এ আলাদা design করতে চাইলে আমরা সে ক্ষেত্রে আলাদা একটা page template বানিয়ে নিতে পারি।


৩.২৫ - থিমের ফাইলগুলো অর্গানাইজ করা
    Download from https://github.com/LearnWithHasinHayder/wp-theme-alpha/releases/tag/may24-organizing 

থিমের রুটে যেসব ফাইলে সাধারণত থাকেতে ই হয়ঃ https://developer.wordpress.org/themes/basics/template-files/ 
    
    
৩.২৬ - সবসময় ইনলাইন স্টাইল অ্যাভয়েড করা দরকার
    Download from https://github.com/LearnWithHasinHayder/wp-theme-alpha/releases/tag/may24-inline-styles 
    
পুর্বে আমরা thumbnail image কে background হিসেবে ব্যবহার করার জন্য নিচের কাজ করেছিলাম। 
<?php
$alpha_feat_image = get_the_post_thumbnail_url(null,"large");
?>

<div class="header page-header" style="background-image: url(<?php echo $alpha_feat_image;?>);">
</div>
তবে inline style avoid korar জন্য নিচের মতো কর লিখতে পারি। functions.php file এই কাজ করতে হবে। wp-head এ একটা hook add করে তার ভিতর style block echo করে css pass করতে হবে।
function alpha_about_page_template_banner(){
    if(is_page()) {
        $alpha_feat_image = get_the_post_thumbnail_url(null,"large");
        ?>
        <style>
            .page-header{
                background-image: url(<?php echo $alpha_feat_image;?>);
            }
        </style>
        <?php
    }
}
add_action("wp_head","alpha_about_page_template_banner", 11);


    
৩.২৭ - কাস্টোমাইজারের সাহায্যে হেডার ইমেজ পরিবর্তন (add_theme_support)
    Download files from https://github.com/LearnWithHasinHayder/wp-theme-alpha/releases/tag/custom-header 
    
কাস্টোমাইজারের সাহায্যে হেডার ইমেজ পরিবর্তন এর জন্য প্রথমে theme support enable করতে হবে।
add_theme_support( "custom-header" );
এর পর নিচের মতো করে ইমেজ সেট করতে হবে। theme template এ header নামে একটা class ache
function alpha_about_page_template_banner(){
    if( is_front_page() ) {
        if( current_theme_supports("custom-header") ) {
            ?>
                <style>
                    .header{
                        background-image: url(<?php echo header_image(); ?>);
                    }
                </style>
            <?php
        }
    }
}
add_action("wp_head","alpha_about_page_template_banner", 11);


    
৩.২৮ - কাস্টোমাইজারে কাস্টম হেডার টেক্সট কালার নিয়ে কাজ কারবার
    Download code files from https://github.com/LearnWithHasinHayder/wp-theme-alpha/releases/tag/custom-header-text-display-and-text-color 
    
নিচের code functions.php তে লিখতে হবে।
নিচের code দ্বারা সাইটে image set করার features add করার পাশাপাশি text color add করার feature ও add করতে পারি। তাহলে আমরা theme এর customizing-> Site Identity তে display site title and tagline নামে একটা টিক দেয়ার option পাবো এবং customizing-> color নামে একটা option পাওয়া যাবে। নিচের code এ display: none css দ্বারা যদি customizing-> Site Identity তে display site title and tagline এ টিক দেয়ার option দ্বারা টিক উঠিয়ে দেয়া হয় তবে title and tagline show করবে না।
$alpha_custom_header_details = array (
    'header-text' => true,
    'default-text-color' => '#222'
);
add_theme_support( "custom-header", $alpha_custom_header_details );
.header h1.heading a, .header h3.tagline -> theme template এ আছে।
    if( is_front_page() ) {
        if( current_theme_supports("custom-header") ) {
            ?>
                <style>

                    .header h1.heading a, .header h3.tagline{
                        color: #<?php echo get_header_textcolor(); ?>;
                        <?php
                            if(! display_header_text()){
                                echo "display: none;";
                            }
                        ?>
                    }
                </style>
            <?php
        }
    }
}
add_action("wp_head","alpha_about_page_template_banner", 11);


    
৩.২৯ - থিম সাপোর্টে কাস্টম লোগোর ব্যবহার
    Download code files from https://github.com/LearnWithHasinHayder/wp-theme-alpha/releases/tag/custom-logo 
    
Customizing -> Site Identity তে logo support add করার জন্যঃ
$alpha_custom_logo_defaults = array(
    "width"     => '100',
    "height"    => '100'
);
add_theme_support("custom-logo", $alpha_custom_logo_defaults);
Logo display করার জন্যঃ
<?php if(current_theme_supports( 'custom-logo' )): ?>
<div class="header-logo text-center">
    <?php the_custom_logo(); ?>
</div>
<?php endif; ?>





Start Below Here
   
   


    
৩.৩০ - কাস্টম হেডার ইমেজে ক্রপিং নিয়ে বিস্তারিত
    Download code files from https://github.com/LearnWithHasinHayder/wp-theme-alpha/releases/tag/custom-header-crop 
    
Custom header image cropping করার জন্য নিচের কোড লিখতে হবে।
$alpha_custom_header_details = array (
    'header-text' => true,
    'default-text-color' => '#222',
    'width' => 1200,
    'height' => 600,
    'flex-height' => true,
    'flex-width'  => true
);
add_theme_support( "custom-header", $alpha_custom_header_details );


    
৩.৩১ - কাস্টম ব্যাকগ্রাউন্ড
    
নিচের কোড দ্বারা  Customizing -> Colors -> Background Color নামে নতুন একটা option পাওয়া যাবে।
add_theme_support("custom-background");
ফ্রি background image খুজে পাওয়ার জন্যঃ https://www.toptal.com/designers/subtlepatterns/ 


    
৩.৩২ - থিমে ৪০৪ এরর পেজ তৈরী করা
    Download code files from https://github.com/LearnWithHasinHayder/wp-theme-alpha/releases/tag/404 
    
404 পেজ তৈরি করার নিয়মঃ
Create a page named: 404.php and create design it. 
কোন code translate ভাবে লিখতে গেলেঃ
_e("your text", "text domain");


    
    
    
    
    
    
    
                    -------------------------------
                        ৪ - প্রজেক্ট ১
                    -------------------------------

৪.১ - প্রজেক্ট ১ - একটা কামিং সুন এইচটিএমএল টেমপ্লেট কে স্ক্র‍্যাচ থেকে থিমে কনভার্ট করা
    Download From https://github.com/LearnWithHasinHayder/launcher/releases/tag/may24-launcher 
    Unzip, rename the folder as “launcher” and paste it in your wp-content/themes/ folder
Wp_header() and wp_footer() - theme এ header and footer load করে।
get_header() and get_footer - theme এর template এ header.php এবং footer.php - includes করে।


    
৪.২ - কাস্টম ফিল্ডের সাথে পরিচয় - খুবই ইম্পর্ট্যান্ট
    Download code files from here https://github.com/LearnWithHasinHayder/launcher/releases/tag/may27-files 
User এর কাছ থেকে data নিয়ে যদি display করতে চাই তবে custom field ব্যবহার করতে হবে।
 
Template এ data ধরার জন্যঃ
$button_label = get_post_meta( get_the_ID(), 'button label', true );
Uporer line এ true দেয়ার কারনে আমরা return data হিসেবে single data পাবো, তা না হলে array return হতো।
Template এ data show করার জন্যঃ
<input type="submit" value="<?php echo esc_attr($button_label); ?>" class="btn btn-primary">


    
৪.৩ - ওয়ার্ডপ্রেসে পিএইচপি স্ক্রিপ্ট থেকে জাভাস্ক্রিপ্টের কাছে ডেটা পাঠানো - খুবই ইম্পর্ট্যান্ট
    Download code files from here https://github.com/LearnWithHasinHayder/launcher/releases/tag/may27-files 
PHP স্ক্রিপ্ট থেকে Javascript কাছে ডেটা পাঠানোর জন্যঃ
wp_localize_script() function ব্যবহার করে এই data পাঠানো যায়। নিচের ছবি দেখলে বঝা যাবে।
 



৪.৪ - পেজ টেমপ্লেটে অন-ডিমান্ড অ্যাসেটস (JS/CSS) লোড করা
    Download code files from here https://github.com/LearnWithHasinHayder/launcher/releases/tag/may27-files 
আমাদের কোন page load হচ্ছে তা বোঝার জন্যঃ
echo basename( get_page_template();
এবার উপরের function ব্যবহার করে page template এর নাম if-else condition এ বসিয়ে css বা js load করতে পারবো।



                    -------------------------------
                        ৫ - পোস্ট নিয়ে কথাবার্তা
                    -------------------------------
                    
                    
৫.১ - সিঙ্গেল পোস্টের পেজিনেশন
    Download the files from https://github.com/LearnWithHasinHayder/wp-theme-alpha/releases/tag/may28-files

৫.২ - পোস্ট ফরম্যাট নিয়ে আলোচনা

৫.৩ - পোস্ট ফরম্যাট অনুযায়ী টেমপ্লেট পার্টস ইউজ করা

৫.৪ - সিঙ্গেল পোস্টে অথর সেকশন দেখানো
    Download the theme files from https://github.com/LearnWithHasinHayder/wp-theme-alpha/releases/tag/authorsection

৫.৫ - সাইডবার চেক - কোন উইজেট থাকলে শুধু তখনই সাইডবার দেখানো

৫.৬ - বডি ক্লাস এবং পোস্ট ক্লাস নিয়ে বিস্তারিত
    Download the theme files from https://github.com/LearnWithHasinHayder/wp-theme-alpha/releases/tag/body_class-and-post_class
    
৫.৭ - ট্যাগ এবং ক্যাটেগরীর আর্কাইভ

৫.৮ - ডে, মান্থ এবং ইয়ারলি আর্কাইভ

৫.৯ - get_query_var কে এসকেপ করা

৫.১০ - অথর পেজ - এবং অথর টেমপ্লেট হায়ারার্কি
    Download the code files from https://github.com/LearnWithHasinHayder/wp-theme-alpha/releases/tag/authorpage

৫.১১ - অ্যাটাচমেন্টস প্লাগইনের সাথে পরিচয় এবং এর সাহায্যে চমৎকার একটা স্লাইডার তৈরী করা


৫.১৫ - থিমে সার্চ ফর্ম যোগ করা
    Download the code files from https://github.com/LearnWithHasinHayder/wp-theme-alpha/releases/tag/search
    
    
৫.১৭ - সার্চ রেজাল্ট কে হাইলাইট করা
    Download the code files from https://github.com/LearnWithHasinHayder/wp-theme-alpha/releases/tag/search
    
    






                    -------------------------------
                        (৬ - ইমেজ সাইজ
                    -------------------------------
    
    
    
    
    
    
    
    
    
                        -------------------------------
                        ৫ - পোস্ট নিয়ে কথাবার্তা
                    -------------------------------
    
    
    
    







