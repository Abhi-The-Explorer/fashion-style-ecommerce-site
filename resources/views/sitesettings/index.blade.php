<form action="{{ route('settings.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    
    <div>
        <label for="header_logo">Header Logo</label>
        <input type="file" name="header_logo" id="header_logo">
    </div>

    <div>
        <label for="footer">Footer logo</label>
        <input type="file" name="footer_logo" id="footer_logo">
    </div>

    <div>
        <label for="contact">Contact Number</label>
        <input type="text" name="contact_number" id="contact_number">
    </div>


    <div>
        <label for="slogan">Copyright</label>
        <input type="text" name="copyright" id="copyright">
    </div>

    <button type="submit">Submit</button>
</form>
