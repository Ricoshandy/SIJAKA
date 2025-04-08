<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- ===== CSS ===== -->
        <link rel="stylesheet" href="/css/styles.css">

       
        <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

        <title>SIJAKA</title>  
     

    
    
    </head>
    <body>
        <div class="l-form">
            <div class="shape1"></div>
            <div class="shape2"></div>

            <div class="form">
                <img src="/image/Logo.png" alt="" class="form__img">

                <form action="{{route('login')}}" method="post" class="form__content">
                    <h1 class="form__title">Welcome to SIJAKA</h1>
                    @csrf 
                    
                
                    <div class="form__div form__div-one">
                        <div class="form__icon">
                            <i class='bx bx-user-circle'></i>
                        </div>

                        <div class="form__div-input">
                            <label for="" class="form__label">User</label>
                            <input type="email" name="email" class="form__input">
                        </div>
                    </div>

                    <div class="form__div">
                        <div class="form__icon">
                            <i class='bx bx-lock' ></i>
                        </div>

                        <div class="form__div-input">
                            <label for="" class="form__label">Pw</label>
                            <input type="password" name="password" class="form__input">
                        </div>
                    </div>
                    <a href="#" class="form__forgot">Forgot Password?</a>

                    <input type="submit" class="form__button" value="Login">

                  
                </form>
            </div>

        </div>
        
        <!-- ===== MAIN JS ===== -->
        <script src="assets/js/main.js"></script>
        
    </body>
</html>