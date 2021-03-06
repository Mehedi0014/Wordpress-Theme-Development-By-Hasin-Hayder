<?php get_header(); ?>
<body  <?php body_class(); ?> >
    <?php get_template_part("hero"); ?>


    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="posts">
                    <?php
                        while( have_posts() ) :
                            the_post();
                    ?>

                    <div class="post" <?php post_class(); ?> >
                        <div class="container">
                            <div class="row">
                                 <div class="col-md-12">
                                    <h2 class="post-title">
                                        <?php the_title(); ?>
                                    </h2>
                                    <p class="">
                                        <strong><?php the_author(); ?></strong><br/>
                                        <?php echo get_the_date(); ?>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <p>
                                       <?php
                                            if(has_post_thumbnail()){
                                                the_post_thumbnail('large', array("class"=>"img-fluid"));
                                            }

                                            the_content();

                                            next_post_link();
                                            echo "<br/>";
                                            previous_post_link();
                                       ?>
                                    </p>
                                </div>
                                <?php if(comments_open()):  ?>
                                <div class="col-md-12">
                                    <?php comments_template(); ?>
                                </div>
                                <?php endif; ?>
                            </div>

                        </div>
                    </div>

                    <?php
                        endwhile;
                    ?>


                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <?php 
                                    the_posts_pagination( array(
                                        'mid_size'  => 2,
                                        'prev_text' => __( 'New Posts', 'alpha' ),
                                        'next_text' => __( 'Old Posts', 'alpha' ),
                                    ) );
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <?php
                    if(is_active_sidebar("sidebar-1")){
                        dynamic_sidebar("sidebar-1");
                    }
                ?>
            </div>
        </div>
    </div>








<?php get_footer(); ?>