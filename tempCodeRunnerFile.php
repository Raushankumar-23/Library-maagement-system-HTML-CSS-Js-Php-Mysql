<?php
<div class="rightinnerdiv">
    <div id="addbook" class="innerright portion" style="<?php if (empty($_REQUEST['view'])) { ?> ">
        <Button class="greenbtn">ADD NEW BOOK</Button>
        <form action="addbookserver_page.php" method="post" enctype="multipart/form-data">
            <label>Book Name:</label><input type="text" name="bookname"/><br>
            <label>Detail:</label><input type="text" name="bookdetail"/><br>
            <label>Autor:</label><input type="text" name="bookaudor"/><br>
            <label>Publication</label><input type="text" name="bookpub"/><br>
            <div>Branch:<input type="radio" name="branch" value="it"><input type="radio" name="name"></div>
            <label>Price:</label><input type="number" name="bookprice"/><br>
            <label>Quantity:</label><input type="number" name="bookquantity"/><br>
            <label>Book Photo</label><input type="file" name="bookphoto"/><br>
            <br>
            <input type="submit" value="SUBMIT"/>
            <br>
            <br>
        </form>
    </div>
</div>