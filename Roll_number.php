
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>CEH</title>
        <title></title>
        <?php require 'utils/styles.php'; ?><!--css links. file found in utils folder-->
        
    </head>
    <body>
        <?php require 'utils/header.php'; ?><!--header content. file found in utils folder-->

        <script>
            src="https://code.jquery.com/jquery-3.6.0.min.js">

            
function smoothScroll(event) {
  event.preventDefault();
  const target = document.querySelector(event.target.getAttribute('href'));
  const targetUrl = target.getAttribute('href');
  if (targetUrl.startsWith("http")) {
    window.location.href = targetUrl; // if the target URL is a different website, redirect to it
  } else {
    const targetPosition = target.offsetTop;
    window.scrollTo({
      top: targetPosition,
      behavior: 'smooth'
    });
  }
}


        </script>
        <div class ="content"><!--body content holder-->
            <div class = "container">
                <div class ="col-md-6 col-md-offset-3">
                    <form action="RegisteredEvents.php" class ="form-group" method="POST">

                        
                        <div class="form-group">
                            <label for="Roll_number"> Student Roll_number: </label>
                            <input type="text"
                                   id="Roll_number"
                                   name="Roll_number"
                                   class="form-control">
                        </div>
                        <button type="submit" class = "btn btn-default">Login</button>
                        
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
