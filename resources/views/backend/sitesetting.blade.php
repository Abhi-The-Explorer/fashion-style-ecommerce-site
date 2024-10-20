<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sitesettings</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets_admin/img/favicon.jpg') }}">

    <style>
        .form-container {
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            margin-left: 250px; /* Adjust for sidebar */
            margin-right: 500px;
            margin-top: 70px; /* Adjust for navbar */
            max-width: 1000px; /* Maximum width for the form container */
        }

        .form-container h4 {
            margin: 0;
        }

        @media (max-width: 1281px) {
            .form-container {
                margin-left: 500px;
                margin-top: 70px;
                padding: 15px;
            }
        }

        /* Initially hide the blog section */
        .blog-section {
            display: none;
        }
    </style>
</head>
<body>
    
<!-- navbar -->
@include('backend.common.navbar')
<!-- end navbar -->

<!-- sidebar -->
@include('backend.common.sidebar')
<!-- end sidebar -->

<!-- content -->
<div style="background-color: #fff; border-radius: 8px; padding: 20px; margin-left: 250px; margin-top: 70px; margin-bottom: 20px; max-width: 1450px;">
    <div style="margin-bottom: 20px;">
        <!-- msg -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div style="flex: 1; padding: 20px; overflow-y: auto;">
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <!-- end msg -->

            <h4 style="margin-left:535px;">Site Settings</h4>
        </div>


        <form action="{{ route('sitesetting.update') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Toggle Buttons Container -->
                    <div style="display: flex; justify-content: center; margin-top: 20px; gap: 10px;">
                        <!-- Our Blog Toggle Button -->
                        <button id="blogToggle" type="button" onclick="toggleBlogSection()" style="padding: 10px 20px; background-color: #28a745; color: #fff; border: none; border-radius: 4px; cursor: pointer; transition: background-color 0.3s, transform 0.2s; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                            Our Blog
                        </button>

                        <!-- About Us Toggle Button -->
                        <button id="aboutUsToggle" type="button" onclick="toggleAboutUsSection()" style="padding: 10px 20px; background-color: #17a2b8; color: #fff; border: none; border-radius: 4px; cursor: pointer; transition: background-color 0.3s, transform 0.2s; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                            About Us
                        </button>

                        <!-- Slider Content Toggle Button -->
                        <button id="sliderToggle" type="button" onclick="toggleSliderContentSection()" style="padding: 10px 20px; background-color: #007bff; color: #fff; border: none; border-radius: 4px; cursor: pointer; transition: background-color 0.3s, transform 0.2s; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                            Slider Content
                        </button>
                    </div>
            <!-- Toggle Buttons End -->




    <!-- normal website logo,header,footer,coypright etc -->

            <!-- Logo -->
            <div style="margin-top: 20px;">
                <label>Logo:</label>
                @if(isset($settings['logo']) && $settings['logo']->value)
                    <div style="margin-bottom: 10px;">
                        <img src="{{ asset('storage/' . $settings['logo']->value) }}" alt="Site Logo" style="max-width: 200px;">
                    </div>
                @else
                    <p>No logo available</p>
                @endif
                <input type="file" name="logo" style="padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
            </div>
            <!-- logo end -->

            <!-- Mobile Number -->
            <div style="margin-top: 20px;">
                <label>Mobile No:</label> <br>
                <input type="text" name="mobile_no" value="{{ $settings['mobile_no']->value ?? '' }}" style="width: 50%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
            </div>

            <!-- Copyright -->
            <div style="margin-top: 20px;">
                <label>Copyright:</label> <br>
                <input type="text" name="copyright" value="{{ $settings['copyright']->value ?? '' }}" style="width: 50%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
            </div>

            <!-- Slogan -->
            <div style="margin-top: 20px;">
                <label>Slogan:</label> <br>
                <input type="text" name="slogan" value="{{ $settings['slogan']->value ?? '' }}" style="width: 50%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
            </div>

    <!-- normal website logo,header,footer,coypright etc -->
        

          <!-- Our Blog Section -->
               <div class="blog-section">
                <div style="margin-top: 20px;">
                    <label>Our Blog Content 1:</label> <br>
                    <input type="text" name="ourblog_content1" value="{{ $settings['ourblog_content1']->value ?? '' }}" style="width: 50%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                </div>

                <div style="margin-top: 20px;">
                    <label>Our Blog Content 2:</label> <br>
                    <input type="text" name="ourblog_content2" value="{{ $settings['ourblog_content2']->value ?? '' }}" style="width: 50%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                </div>

                <div style="margin-top: 20px;">
                    <label>Our Blog Content 3:</label> <br>
                    <input type="text" name="ourblog_content3" value="{{ $settings['ourblog_content3']->value ?? '' }}" style="width: 50%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                </div>

                <div style="margin-top: 20px;">
                    <label>Our Blog Slogan 1:</label> <br>
                    <input type="text" name="ourblog_slogan1" value="{{ $settings['ourblog_slogan1']->value ?? '' }}" style="width: 50%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                </div>

                <div style="margin-top: 20px;">
                    <label>Our Blog Slogan 2:</label> <br>
                    <input type="text" name="ourblog_slogan2" value="{{ $settings['ourblog_slogan2']->value ?? '' }}" style="width: 50%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                </div>

                <div style="margin-top: 20px;">
                    <label>Our Blog Slogan 3:</label> <br>
                    <input type="text" name="ourblog_slogan3" value="{{ $settings['ourblog_slogan3']->value ?? '' }}" style="width: 50%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                </div>

                <!-- Our Blog Images -->
                <div style="margin-top: 20px;">
                    <label>Our Blog Image 1:</label>
                    @if(isset($settings['ourblog_image1']) && $settings['ourblog_image1']->value)
                        <div style="margin-bottom: 10px;">
                            <img src="{{ asset('storage/' . $settings['ourblog_image1']->value) }}" alt="Blog Image 1" style="max-width: 200px;">
                        </div>
                    @else
                        <p>No image available</p>
                    @endif
                    <input type="file" name="ourblog_image1" style="padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                </div>

                <div style="margin-top: 20px;">
                    <label>Our Blog Image 2:</label>
                    @if(isset($settings['ourblog_image2']) && $settings['ourblog_image2']->value)
                        <div style="margin-bottom: 10px;">
                            <img src="{{ asset('storage/' . $settings['ourblog_image2']->value) }}" alt="Blog Image 2" style="max-width: 200px;">
                        </div>
                    @else
                        <p>No image available</p>
                    @endif
                    <input type="file" name="ourblog_image2" style="padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                </div>

                <div style="margin-top: 20px;">
                    <label>Our Blog Image 3:</label>
                    @if(isset($settings['ourblog_image3']) && $settings['ourblog_image3']->value)
                        <div style="margin-bottom: 10px;">
                            <img src="{{ asset('storage/' . $settings['ourblog_image3']->value) }}" alt="Blog Image 3" style="max-width: 200px;">
                        </div>
                    @else
                        <p>No image available</p>
                    @endif
                    <input type="file" name="ourblog_image3" style="padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                </div>
                <!-- Our Blog Images End -->
              </div>
        <!-- Our Blog Section End -->


            <!-- Slider Content Section -->

                <div class="slider-content-section" style="display: none;">

                    <div style="margin-top: 20px;">
                        <label>First slider Content 1:</label> <br>
                        <input type="text" name="A-content1" value="{{ $settings['A-content1']->value ?? '' }}" style="width: 50%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                    </div>

                    <div style="margin-top: 20px;">
                        <label>First slider Content 2:</label> <br>
                        <input type="text" name="A-content2"  value="{{ $settings['A-content2']->value ?? '' }}" style="width: 50%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                    </div>

                    <div style="margin-top: 20px;">
                        <label>First slider Content 3:</label> <br>
                        <input type="text" name="A-content3" value="{{ $settings['A-content3']->value ?? '' }}" style="width: 50%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                    </div>


                    <div style="margin-top: 20px;">
                    <label>Slider Image 1:</label>
                    @if(isset($settings['A-image']) && $settings['A-image']->value)
                        <div style="margin-bottom: 10px;">
                            <img src="{{ asset('storage/' . $settings['A-image']->value) }}" alt="Blog Image 1" style="max-width: 200px;">
                        </div>
                    @else
                        <p>No image available</p>
                    @endif
                    <input type="file" name="A-image" style="padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                   </div>

                    <div style="margin-top: 20px;">
                        <label>Second slider Content 1:</label> <br>
                        <input type="text" name="B-content1" value="{{ $settings['B-content1']->value ?? '' }}" style="width: 50%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                    </div>

                    <div style="margin-top: 20px;">
                        <label>Second slider Content 2:</label> <br>
                        <input type="text" name="B-content2" value="{{ $settings['B-content2']->value ?? '' }}" style="width: 50%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                    </div>

                    <div style="margin-top: 20px;">
                        <label>Second slider Content 3:</label> <br>
                        <input type="text" name="B-content3" value="{{ $settings['B-content3']->value ?? '' }}" style="width: 50%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                    </div>

                    <div style="margin-top: 20px;">
                    <label>Slider Image 2:</label>
                    @if(isset($settings['B-image']) && $settings['B-image']->value)
                        <div style="margin-bottom: 10px;">
                            <img src="{{ asset('storage/' . $settings['B-image']->value) }}" alt="Blog Image 1" style="max-width: 200px;">
                        </div>
                    @else
                        <p>No image available</p>
                    @endif
                    <input type="file" name="B-image" style="padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                   </div>
                <br>


             <!-- shipping ads -->

                  <div style="margin-top: 20px;">
                        <label>Shippings Ads Content 1:</label> <br>
                        <input type="text" name="shipping_content1" value="{{ $settings['shipping_content1']->value ?? '' }}"  style="width: 50%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                    </div>

                    <div style="margin-top: 20px;">
                        <label>Shippings Ads SubContent 1:</label> <br>
                        <input type="text" name="shipping_subcontent1" value="{{ $settings['shipping_subcontent1']->value ?? '' }}"  style="width: 50%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                    </div>

                    <div style="margin-top: 20px;">
                    <label>Shipping ads Image 1:</label>
                    @if(isset($settings['shipping-image1']) && $settings['shipping-image1']->value)
                        <div style="margin-bottom: 10px;">
                            <img src="{{ asset('storage/' . $settings['shipping-image1']->value) }}" alt="Blog Image 1" style="max-width: 200px;">
                        </div>
                    @else
                        <p>No image available</p>
                    @endif
                    <input type="file" name="shipping-image1" style="padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                   </div>



                  <div style="margin-top: 20px;">
                        <label>Shippings Ads Content 2:</label> <br>
                        <input type="text" name="shipping_content2" value="{{ $settings['shipping_content2']->value ?? '' }}" style="width: 50%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                    </div>

                    <div style="margin-top: 20px;">
                        <label>Shippings Ads SubContent 2:</label> <br>
                        <input type="text" name="shipping_subcontent2" value="{{ $settings['shipping_subcontent2']->value ?? '' }}" style="width: 50%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                    </div>

                    <div style="margin-top: 20px;">
                    <label>Shipping ads Image 2:</label>
                    @if(isset($settings['shipping-image2']) && $settings['shipping-image2']->value)
                        <div style="margin-bottom: 10px;">
                            <img src="{{ asset('storage/' . $settings['shipping-image2']->value) }}" alt="Blog Image 1" style="max-width: 200px;">
                        </div>
                    @else
                        <p>No image available</p>
                    @endif
                    <input type="file" name="shipping-image2" style="padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                   </div>


                  <div style="margin-top: 20px;">
                        <label>Shippings Ads Content 3:</label> <br>
                        <input type="text" name="shipping_content3" value="{{ $settings['shipping_content3']->value ?? '' }}" style="width: 50%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                    </div>

                    <div style="margin-top: 20px;">
                        <label>Shippings Ads SubContent 3:</label> <br>
                        <input type="text" name="shipping_subcontent3" value="{{ $settings['shipping_subcontent3']->value ?? '' }}" style="width: 50%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                    </div>

                    <div style="margin-top: 20px;">
                    <label>Shipping ads Image 3:</label>
                    @if(isset($settings['shipping-image3']) && $settings['shipping-image3']->value)
                        <div style="margin-bottom: 10px;">
                            <img src="{{ asset('storage/' . $settings['shipping-image3']->value) }}" alt="Blog Image 1" style="max-width: 200px;">
                        </div>
                    @else
                        <p>No image available</p>
                    @endif
                    <input type="file" name="shipping-image3" style="padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                   </div>


                  <div style="margin-top: 20px;">
                        <label>Shippings Ads Content 4:</label> <br>
                        <input type="text" name="shipping_content4" value="{{ $settings['shipping_content4']->value ?? '' }}" style="width: 50%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                    </div>

                    <div style="margin-top: 20px;">
                        <label>Shippings Ads SubContent 4:</label> <br>
                        <input type="text" name="shipping_subcontent4" value="{{ $settings['shipping_subcontent4']->value ?? '' }}" style="width: 50%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                    </div>

                    <div style="margin-top: 20px;">
                    <label>Shipping ads Image 4:</label>
                    @if(isset($settings['shipping-image4']) && $settings['shipping-image4']->value)
                        <div style="margin-bottom: 10px;">
                            <img src="{{ asset('storage/' . $settings['shipping-image4']->value) }}" alt="Blog Image 1" style="max-width: 200px;">
                        </div>
                    @else
                        <p>No image available</p>
                    @endif
                    <input type="file" name="shipping-image4" style="padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                   </div>

                <!-- shipping ads end -->

                </div>

            <!-- Slider Content Section End -->


        <!-- About Us Section -->
            <div class="about-us-section" style="display: none;">
                <div style="margin-top: 20px;">
                    <label>About Us Title:</label> <br>
                    <input type="text" name="about_us_title" value="{{ $settings['about_us_title']->value ?? '' }}" style="width: 50%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                </div>

                <div style="margin-top: 20px;">
                    <label>About Us Subtitle:</label> <br>
                    <input type="text" name="about_us_subtitle" value="{{ $settings['about_us_subtitle']->value ?? '' }}" style="width: 50%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                </div>

                <div style="margin-top: 20px;">
                    <label>About Us Description:</label> <br>
                    <textarea name="about_us_description" rows="4" style="width: 50%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">{{ $settings['about_us_description']->value ?? '' }}</textarea>
                </div>

                <div style="margin-top: 20px;">
                    <label>About Us Breadcrumb Title:</label> <br>
                    <input type="text" name="about_us_breadcrumb_title" value="{{ $settings['about_us_breadcrumb_title']->value ?? '' }}" style="width: 50%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                </div>

                <!-- Vision Section -->
                <div style="margin-top: 20px;">
                    <label>Vision Title:</label> <br>
                    <input type="text" name="vision_title" value="{{ $settings['vision_title']->value ?? '' }}" style="width: 50%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                </div>

                <div style="margin-top: 20px;">
                    <label>Vision Description:</label> <br>
                    <textarea name="vision_description" rows="4" style="width: 50%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">{{ $settings['vision_description']->value ?? '' }}</textarea>
                </div>

                <!-- Mission Section -->
                <div style="margin-top: 20px;">
                    <label>Mission Title:</label> <br>
                    <input type="text" name="mission_title" value="{{ $settings['mission_title']->value ?? '' }}" style="width: 50%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                </div>

                <div style="margin-top: 20px;">
                    <label>Mission Description:</label> <br>
                    <textarea name="mission_description" rows="4" style="width: 50%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">{{ $settings['mission_description']->value ?? '' }}</textarea>
                </div>

                <!-- Goal Section -->
                <div style="margin-top: 20px;">
                    <label>Goal Title:</label> <br>
                    <input type="text" name="goal_title" value="{{ $settings['goal_title']->value ?? '' }}" style="width: 50%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                </div>

                <div style="margin-top: 20px;">
                    <label>Goal Description:</label> <br>
                    <textarea name="goal_description" rows="4" style="width: 50%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">{{ $settings['goal_description']->value ?? '' }}</textarea>
                </div>

                <!-- Banner Titles -->
                <div style="margin-top: 20px;">
                    <label>Banner Title 1:</label> <br>
                    <input type="text" name="banner_title1" value="{{ $settings['banner_title1']->value ?? '' }}" style="width: 50%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                </div>

                <div style="margin-top: 20px;">
                    <label>Banner Title 2:</label> <br>
                    <input type="text" name="banner_title2" value="{{ $settings['banner_title2']->value ?? '' }}" style="width: 50%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                </div>

                <div style="margin-top: 20px;">
                    <label>Banner Title 3:</label> <br>
                    <input type="text" name="banner_title3" value="{{ $settings['banner_title3']->value ?? '' }}" style="width: 50%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                </div>

                <!-- Banner Prices -->
                <div style="margin-top: 20px;">
                    <label>Banner Price 1:</label> <br>
                    <input type="text" name="banner_price1" value="{{ $settings['banner_price1']->value ?? '' }}" style="width: 50%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                </div>

                <div style="margin-top: 20px;">
                    <label>Banner Price 2:</label> <br>
                    <input type="text" name="banner_price2" value="{{ $settings['banner_price2']->value ?? '' }}" style="width: 50%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                </div>

                <div style="margin-top: 20px;">
                    <label>Banner Price 3:</label> <br>
                    <input type="text" name="banner_price3" value="{{ $settings['banner_price3']->value ?? '' }}" style="width: 50%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                </div>

                <!-- Banner Images -->
                <div style="margin-top: 20px;">
                    <label>Banner Image 1:</label>
                    @if(isset($settings['banner_image1']) && $settings['banner_image1']->value)
                        <div style="margin-bottom: 10px;">
                            <img src="{{ asset('storage/' . $settings['banner_image1']->value) }}" alt="Banner Image 1" style="max-width: 200px;">
                        </div>
                    @else
                        <p>No image available</p>
                    @endif
                    <input type="file" name="banner_image1" style="padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                </div>

                <div style="margin-top: 20px;">
                    <label>Banner Image 2:</label>
                    @if(isset($settings['banner_image2']) && $settings['banner_image2']->value)
                        <div style="margin-bottom: 10px;">
                            <img src="{{ asset('storage/' . $settings['banner_image2']->value) }}" alt="Banner Image 2" style="max-width: 200px;">
                        </div>
                    @else
                        <p>No image available</p>
                    @endif
                    <input type="file" name="banner_image2" style="padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                </div>

                <div style="margin-top: 20px;">
                    <label>Banner Image 3:</label>
                    @if(isset($settings['banner_image3']) && $settings['banner_image3']->value)
                        <div style="margin-bottom: 10px;">
                            <img src="{{ asset('storage/' . $settings['banner_image3']->value) }}" alt="Banner Image 3" style="max-width: 200px;">
                        </div>
                    @else
                        <p>No image available</p>
                    @endif
                    <input type="file" name="banner_image3" style="padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                </div>

          <!-- Team Member Images
           
                <div style="margin-top: 20px;">
                    <label>Team Member Image 1:</label>
                    @if(isset($settings['team_member_image1']) && $settings['team_member_image1']->value)
                        <div style="margin-bottom: 10px;">
                            <img src="{{ asset('storage/' . $settings['team_member_image1']->value) }}" alt="Team Member Image 1" style="max-width: 200px;">
                        </div>
                    @else
                        <p>No image available</p>
                    @endif
                    <input type="file" name="team_member_image1" style="padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                </div>

                <div style="margin-top: 20px;">
                    <label>Team Member Image 2:</label>
                    @if(isset($settings['team_member_image2']) && $settings['team_member_image2']->value)
                        <div style="margin-bottom: 10px;">
                            <img src="{{ asset('storage/' . $settings['team_member_image2']->value) }}" alt="Team Member Image 2" style="max-width: 200px;">
                        </div>
                    @else
                        <p>No image available</p>
                    @endif
                    <input type="file" name="team_member_image2" style="padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                </div>

                <div style="margin-top: 20px;">
                    <label>Team Member Image 3:</label>
                    @if(isset($settings['team_member_image3']) && $settings['team_member_image3']->value)
                        <div style="margin-bottom: 10px;">
                            <img src="{{ asset('storage/' . $settings['team_member_image3']->value) }}" alt="Team Member Image 3" style="max-width: 200px;">
                        </div>
                    @else
                        <p>No image available</p>
                    @endif
                    <input type="file" name="team_member_image3" style="padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                </div>

                <div style="margin-top: 20px;">
                    <label>Team Member Image 4:</label>
                    @if(isset($settings['team_member_image4']) && $settings['team_member_image4']->value)
                        <div style="margin-bottom: 10px;">
                            <img src="{{ asset('storage/' . $settings['team_member_image4']->value) }}" alt="Team Member Image 4" style="max-width: 200px;">
                        </div>
                    @else
                        <p>No image available</p>
                    @endif
                    <input type="file" name="team_member_image4" style="padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                </div> -->
            </div>
        <!-- About Us Section End -->



<br>
            <!-- Submit Button -->
            <div style="margin-top: 20px;">
                <button type="submit" class="btn btn-submit" style="padding: 10px 20px; margin-left:20px; background-color: #007bff; color: #fff; border: none; border-radius: 4px;">Update Settings</button>
            </div>

            <div style="margin-top: 20px;">
                <a href="{{ route('admin.dashboard') }}" class="btn btn-submit" style="margin-top:-102px; margin-left:210px; padding: 10px 20px; border: none; border-radius: 4px;">Cancel</a>
            </div>
        </form>
    </div>
</div>
<!-- content -->

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    function toggleBlogSection() {
        const blogSection = document.querySelector('.blog-section');
        if (blogSection.style.display === "none" || blogSection.style.display === "") {
            blogSection.style.display = "block";
        } else {
            blogSection.style.display = "none";
        }
    }


        function toggleAboutUsSection() {
            const aboutUsSection = document.querySelector('.about-us-section');
            if (aboutUsSection.style.display === "none" || aboutUsSection.style.display === "") {
                aboutUsSection.style.display = "block";
            } else {
                aboutUsSection.style.display = "none";
            }

            }


            // for shipping ads
            function toggleSliderContentSection() {
                const sliderContentSection = document.querySelector('.slider-content-section');
                if (sliderContentSection.style.display === "none" || sliderContentSection.style.display === "") {
                    sliderContentSection.style.display = "block"; // Show the section
                } else {
                    sliderContentSection.style.display = "none"; // Hide the section
                }
            }

            // Optional: Set the initial state to hidden when the page loads
            document.addEventListener("DOMContentLoaded", function() {
                const sliderContentSection = document.querySelector('.slider-content-section');
                sliderContentSection.style.display = "none"; // Start hidden
            });

            // shipping ads end



    $(document).ready(function() {
        $('.alert-dismissible .close').click(function() {
            $(this).parent('.alert').fadeOut();
        });
    });
</script>

</body>
</html>
