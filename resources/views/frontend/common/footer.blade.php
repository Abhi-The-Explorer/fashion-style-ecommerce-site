<footer style="padding: 20px 0; font-family: Arial, sans-serif; text-align: center;">
    
    <div style=" background-color: #f0f0f0;">
    <a href=""><br><br><br></a>
    </div>


    <div style="max-width: 1200px; margin: 0 auto; display: flex; flex-wrap: wrap; justify-content: space-between; align-items: center;">
        <!-- Logo Section -->
        <div style="flex: 1; text-align: left;">
            <a href="#">
                <img src="{{ asset('storage/' . $siteSettings['logo']->value) }}" 
                     style="width: 210px; height: auto;"> <!-- Increased size by 40% -->
            </a>
        </div>

        <!-- Links Section -->
        <div style="flex: 2; text-align: center;">
            <ul style="list-style: none; padding: 0; margin: 0; display: flex; justify-content: center; gap: 20px;">
                <li style="margin: 0;">
                    <a href="{{ route('aboutus') }}" style="color: #333; text-decoration: none; font-size: 14px; font-weight: bold;">About Us</a>
                </li>
                <li style="margin: 0;">
                    <a href="{{ route('products.shop') }}" style="color: #333; text-decoration: none; font-size: 14px; font-weight: bold;">Shop Now</a>
                </li>
                <li style="margin: 0;">
                    <a href="{{ route('contact.form') }}" style="color: #333; text-decoration: none; font-size: 14px; font-weight: bold;">Contact</a>
                </li>
                <li style="margin: 0;">
                    <a href="{{ route('order.status') }}"  style="color: #333; text-decoration: none; font-size: 14px; font-weight: bold;">Orders Tracking</a>
                </li>
            </ul>
        </div>

        <!-- Contact Section -->
        <div style="flex: 1; text-align: right;">
            <h4 style="margin: 5px 0 0; font-size: 14px; font-weight: bold; color: #333;">Mobile No:</h4>
            <p style="margin: 0; font-size: 12px; color: #555;">
                {{ $siteSettings['mobile_no']->value ?? 'No contact number available' }}
            </p>
        </div>
    </div>

    <!-- Copyright Section -->
    <div style="margin-top: 0px; padding-top: 10px; text-align: center;">
        <p style="font-size: 16px; color: #333; font-weight: bold; margin: 0;">
            © {{ $siteSettings['copyright']->value ?? 'No details found' }}
        </p>

        <br>
    </div>
</footer>
