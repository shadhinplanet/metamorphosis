<?php
/**
    Template Name: Mission

 */

get_header();
?>
<?php
while ( have_posts() ) :
the_post(); ?>
<section class="phosis_banner_area" style="background-image:url(<?php echo get_template_directory_uri()?>/assets/img/mission_bg.jpg)">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-md-12 align-self-end">
                <div class="phosis_banner">
                    <h2>Meta-Morphosis Juvenile Offender <br>
                        Education and Re-Entry Support</h2>
                    <h3>Pre-release life skills training & post release <br>
                        re-entry Assistance juvenile re-entry</h3>
                    <div class="phosis_buttons">
                        <a href="#" class="btn_color2">Start your free trial</a>
                        <a href="#" class="btn_color3">Buy Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="phosis_space" style="height:100px"></section>
<section class="phosis_section_title">
    <h2>Our Mission & Purpose</h2>
</section>
<section class="phosis_space" style="height:50px"></section>


<section class="phosis_two_column_area theme_1">
    <div class="container">
        <div class="row">
          <div class="col-md-12">
              <div class="phosis_two_column">
                  <div class="phosis_two_column_image">
                      <img src="<?php echo get_template_directory_uri()?>/assets/img/purpose.jpg" alt="">
                  </div>
                  <div class="phosis_two_column_contents">
                      <h2>PROPELLED FOR SUCCESS</h2>
                      <p>An opportunity for future success requires a fresh vision, better choices, mentoring, a plan with action steps.  Pre-release education prepares the way. Hands on mentoring at release with financial support jump-starts a new life. Guidance to choose positive  environments and peers. Uplifting activites and socialization. An understanding of budgeting, employer expectations.</p>
                  </div>
              </div>
          </div>
        </div>
    </div>
</section>

<section class="phosis_space" style="height:200px"></section>
<section class="phosis_two_column_area theme_2">
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="phosis_two_column">                
                <div class="phosis_two_column_contents">
                    <h2>SUPPORT SYSTEMS FOR JUVENILES</h2>
                    <p>Reduce recidivism and enhance the likelihood a former juvenile offender can successfully integrate into the community requires several components working in unison. Among these are, of course, early stage financial assistance, appropriate enviornments and encouragement with guidance from mentors. We provide 'know how' based on experience to help our clients or your third party organization improve the chance for successful re-entry. Meta-Morphosis provides the pre and post release materials with implementations processes.</p>
                </div>
                <div class="phosis_two_column_image">
                    <img src="<?php echo get_template_directory_uri()?>/assets/img/support.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
</section>

<section class="phosis_space" style="height:200px"></section>

<section class="phosis_two_column_area theme_1">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="phosis_two_column">
                    <div class="phosis_two_column_image">
                        <img src="<?php echo get_template_directory_uri()?>/assets/img/life2.jpg" alt="">
                    </div>
                    <div class="phosis_two_column_contents">
                        <h2>A NEW LIFE . . . FAMILY . . . COMMUNITY</h2>
                        <p>The former dysfunctional environments, choices and lack of opportunity disappear. The former juvenile offender is employed. New friendships. Community involvement. Perhaps a family. Your participation with pre-release education and/or  post release mentoring with modest financial assistance enhances this reality.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="phosis_space" style="height:200px"></section>
<?php   endwhile; // End of the loop.?>


<?php
get_footer();
