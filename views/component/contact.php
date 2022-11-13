<link rel="stylesheet" href="../style/contact.css">

<div class="container2">

    <div class="wrapper1">

        <form class="form" method="post">
            <div align=center class="mt-2">
                <div class="rabbit">
                    <div class="camera">
                    </div>
                </div>
            </div>
            <div>
                <h1 style="color: bule;" align=center>Contact </h1>
            </div>
            <div style="height: 70%; margin: 10px;">
                <div>
                    <!-- <label for="">Fisrt Name</label>
                    <input type="text" name="firstname" required>
                </div>

                <div>
                    <label for="">Last Name</label>
                    <input type="text" name="lastname" required>
                </div> -->

                    <div>
                        <label for="">Email</label>
                        <input type="email" name="email" required>
                    </div>

                    <div>
                        <label for="">subject</label>
                        <input type="text" name="subject" required>
                    </div>

                    <div>
                        <label for="">Message</label>
                        <textarea class="input2" type="text" name="body" id="" required></textarea>
                    </div>
                   
                </div>
                <div style="height: 13%; margin-top: 5px;" align=center>
                    <input class="btn btn-primary" style="width: 60%;" type="submit" name="submit" value="SEND">
                </div>
                <div style="color:green; " align =center>
                    <?php
                    if (isset($_POST['submit'])) {
                        $url = "https://script.google.com/macros/s/AKfycbyQBs48MkGTJq28ZSIBvPudO9lqwwSdYsY03cPzHejByLa8AE_v46434YynDyVSKvr4eA/exec";
                        $ch = curl_init($url);

                        curl_setopt_array($ch, [
                            CURLOPT_RETURNTRANSFER => true,
                            CURLOPT_FOLLOWLOCATION => true,
                            CURLOPT_POSTFIELDS => http_build_query([
                                "recipient" => $_POST['email'],
                                "subject" => $_POST['subject'],
                                "body" => $_POST['body'],
                            ])
                        ]);
                        $result = curl_exec($ch);
                        echo $result;
                    }
                    ?>
                </div>  
                <div style="height: 15%; margin-top:150px; " class="bottom">
                    <i class="fal fa-table fa-lg"></i>
                    <i class="far fa-square fa-lg"></i>
                    <i class="far fa-play fa-lg"></i>
                </div>
             
        </form>

</div>
</div>

<style>

</style>