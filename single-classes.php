<?php
/**
 * The template for displaying all single Classes
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Metamorphosis
 */

get_header();
$user_id = get_current_user_id();

while ( have_posts() ) :

the_post();

$files = get_post_meta(get_the_ID(), '_class_files', true); 
$document_mode = get_post_meta(get_the_ID(), '_document_display', true); 

$moduletitle_sidebar = get_post_meta(get_the_ID(), '_module_title_sidebar', true); 
$moduletitle = get_post_meta(get_the_ID(), '_module_title', true); 
$module_sidebar_menu = get_post_meta(get_the_ID(), '_module_sidebar_menu', true); 



endwhile;
?>

<section class="phosis_single_classes_area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
              <div class="phosis_class_title_area">
                  <div class="module_name"> 
                      <?php if(!empty($moduletitle_sidebar)): ?>
                          <h2><?php echo $moduletitle_sidebar; ?></h2>
                      <?php endif; ?>
                  </div>
                  <div class="module_class_title">
                      <?php if(!empty($moduletitle)): ?>
                          <h2><?php echo $moduletitle; ?></h2>
                      <?php endif; ?>
                      <h3><?php the_title(); ?></h3>
                  </div>
              </div>


               <?php 

if(can_user_access_content(get_current_user_id(),$post->ID)){
    $access = true;
} else {
    $access = false;
    if(!is_user_logged_in(  )){
         $message = 'You need to <a href="'.esc_url( site_url('login') ).'?redirect_to='.get_permalink().'"  class="btn_color2">Login</a> to access the content!';
    }else{
        $message = 'You need membership access to see the content! <a href="'.esc_url( site_url( 'enroll' ) ).'"  class="btn_color2">Enroll Now!</a>';
    }
}

                    if($access){?>

                    <div class="phosis_single_class_maincontent">
                                                <div class="phosis_module_sidebar">

                                                    <div class="phosis_module_lists">
                                                        <div class="single_module_nav">
                                                            <?php 
                                                            if ( has_nav_menu( 'primary-menu' ) ) {
                                                                wp_nav_menu( array( 
                                                                    'menu' => $module_sidebar_menu,
                                                                    'container' => '',
                                                                    'menu_class' => 'phosis_module_menu',
                                                                    'menu_id' => 'phosis_module_menu',
                                                                ) );
                                                            }?>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="phosis_class_maincontent">                    
                                                    
                                                    <div class="phosis_class_content">                        
                                                        <?php  the_content(); ?>
                                                    </div>
                                                    
                                                    
                                                        <?php if(!empty($files)):?>                          

                                                            <?php if($document_mode == 'popup'): ?>

                                                            <div class="phosis_class_files">
                                                                <h1>Documents</h1>
                                                                <?php
                                                                $count = 0;
                                                                foreach($files as $file) : 
                                                                $ext = pathinfo($file, PATHINFO_EXTENSION);     
                                                                $filename_dassed = basename($file,$ext);        
                                                                $filename = str_replace('-', ' ', $filename_dassed);
                                                                $dynamic_class = rand(4545454,4254545);
                                                                $count++;
                                                                ?>
                                                                <div class="single_document">
                                                                    <p><?php echo $filename; ?></p>
                                                                    <div class="document_actions">
                                                                        <a data-toggle="modal" data-target="#document-<?php echo $count; ?>" href="#" class="action_view">View</a>
                                                                        <form method="get" action="<?php echo $file; ?>">
                                                                            <button type="submit" class="action_download">Download</button>
                                                                        </form>
                                                                    </div>

                                                                    <div class="modal fade" id="document-<?php echo $count; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                        <div class="modal-dialog modal-lg modal-dialog-centered">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title" id="document-<?php echo $count; ?>Label"><?php echo $filename; ?></h5>
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="modal-body">


                                                                                    <?php if($ext == 'pdf'): ?>
                                                                                    <iframe src="<?php echo $file; ?>" width="100%" class="document_preview" frameborder="0"></iframe>
                                                                                    <?php endif; ?>
                                                                                    <?php if( $ext == 'doc' || $ext == 'docx' || $ext == 'ppt' || $ext == 'pptx' ): ?>
                                                                                    <iframe src='https://view.officeapps.live.com/op/embed.aspx?src=<?php echo $file; ?>' class="document_preview" width='100%' frameborder='0'> </iframe>


                                                                                    <?php endif; ?>

                                                                                    <div class="doc_download">
                                                                                        <form method="get" action="<?php echo $file; ?>">
                                                                                            <button type="submit" class="action_download">Download</button>
                                                                                        </form>

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>    

                                                                <?php endforeach; ?>
                                                            </div>
                                                            <?php endif; ?>

                                                            <?php if($document_mode == 'page'): ?>
                                                            <div class="phosis_class_files_area">
                                                                <?php
                                                                $count = 0;
                                                                foreach($files as $file) : 
                                                                $ext = pathinfo($file, PATHINFO_EXTENSION);     
                                                                $filename_dassed = basename($file,$ext);        
                                                                $filename = str_replace('-', ' ', $filename_dassed);
                                                                $dynamic_class = rand(4545454,4254545);
                                                                $count++;
                                                                ?>

                                                                <div class="phosis_class_files">
                                                                    <?php if($ext == 'pdf'): ?>
                                                                    <h2><?php echo $filename; ?></h2>
                                                                    <iframe src="<?php echo $file; ?>" width="100%" class="document_preview" frameborder="0"></iframe>
                                                                    <?php endif; ?>
                                                                    <?php if( $ext == 'doc' || $ext == 'docx' || $ext == 'ppt' || $ext == 'pptx' ): ?>
                                                                    <h2><?php echo $filename; ?></h2>
                                                                    <iframe src='https://view.officeapps.live.com/op/embed.aspx?src=<?php echo $file; ?>' class="document_preview" width='100%' frameborder='0'> </iframe>


                                                                    <?php endif; ?>
                                                                    <div class="doc_download">
                                                                        <form method="get" action="<?php echo $file; ?>">
                                                                            <button type="submit" class="action_download">Download</button>
                                                                        </form>

                                                                    </div>
                                                                </div>

                                                                <?php endforeach; ?>
                                                            </div>

                                                            <?php endif; ?>

                                                        <?php endif; ?>
                                                    <?php echo do_shortcode('[comments]'); ?>                                
                                            </div>

                    <?php

                    }else{ ?>
                        <div class="no_access">
                            <div class="alert alert-danger text-center" role="alert">                        
                                <?php echo $message; ?>
                            </div>
                        </div>
                        <?php } ?>




              
                
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
