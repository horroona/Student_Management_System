<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Student Report</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />

    <script src="main.js"></script>

    <style>

        body{

            background: lightgrey;
        }
        #mainDiv{

                text-align: center;
                padding-top: 10%;
        }

        #form{

            background-color: grey;
            border: 1px solid;
            border-radius: 25px;
            padding-top: 30px;
            padding-bottom: 30px;
            margin-left: 25%;
            margin-right: 25%;

        }

        #email{

            position: relative;
            height: 20px;
        }

        #submit{

            border-radius: 50px;
            width: 90px;
        }

        #sp{

            position: absolute;
            color: red;
        }

    </style>

</head>

<body>

    <?php
    
        $email = '';
        $emailError = '';

        if($_SERVER['REQUEST_METHOD'] == "POST"){
            
            $email = $_POST['email'];

            if(empty($_POST['email'])){

                $emailError = "* Please enter email";

            }
                    
            else
            {
                
                if(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
                {

                    session_start();
                    $_SESSION['email'] = $email;
                    header("Location: Report.php");
                    exit;

                }         
               else{
            
                    $emailError = "* Please enter valid email";

                }
            }
            
        }

?>
    <div id ="mainDiv">
        <form id ="form" action = "" method = "POST">
            
            <img src ="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBxISEBIQDxISEBUPEA8OEBAPEBAPDxIPFRUWFhUSFRUYHSggGBooHRcVITEhJSkrLi8uFx8zODM4NygwLisBCgoKDg0OGxAQGy0mICUtLS0vNy0tLS0uLi03LS0tLTItLy0tLS0tLTEuLS01LTEuLS0tLTUtLS0tLS0tLS0tLf/AABEIALkBEQMBEQACEQEDEQH/xAAcAAEAAQUBAQAAAAAAAAAAAAAABAECAwUGBwj/xABCEAACAQMBBgMGAgYHCQEAAAAAAQIDBBEFBhIhMUFRE2FxByIygZGhscEUI0JSYnJDgqLR4fDxFSUzNHOSo9LiJP/EABoBAQACAwEAAAAAAAAAAAAAAAAEBQIDBgH/xAAzEQEAAgECBAIIBgIDAQAAAAAAAQIDBBEFEiExE0EiMlFxgZGx4SNhocHR8DPxFBVCBv/aAAwDAQACEQMRAD8A9xAAAAAABo9p9pKdnGO8nOdTO5TTxlLnKT6LiiLqtVXBXeespek0ltRbaJ2iO8oejbXKs0p09zPJxlvfVYK3Dxqtr8t67fnvum6nhM4681Lb/B06eeKLuJiY3hTqnoAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAebe1Sykq1C45wlT8DyjOLlJfVSf/aU3Fcc7xfy7LrhWSOW1PPu5/SLlxaw+qa9TnM1ZjrC8ja9dpeqbP3qqU15LPy/1On4VqfFxcs+TltdhnHkbUtUIAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA1m0elq6tqlF4zJZpt/s1Fxi/rwfk2ac+KMuOay3afLOLJF/7s8YoScZOMk4uLcZJ81JPDT+ZyWWkxMxLrcVo6TDutktS3ZJN8H/AJf+fIaDP4Gb8kTiWn8Sm8O/TOzhy6oAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAADyz2jaT4NyriCxC5+LHJVlz+qw/VSKHieDlvzx2n6r7hmfmx8k94+jV6Rdbsl5PKKHLXb0oXO0XrtL1TQbxVKS7xwvl0/u+R1XC9T42Hbzj+w5PW4fDye9syyRAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAADV7TaSrq2qUeG81vU2+lWPGL9Oj8mzTqMUZcc1b9NmnFki/z9zxq2m4yw004vDT4NNc0zkctNt4l1mO0eTvNktS3ZpN8JcH6My4bqfAzxE9p6IXE9Pz03h3p2TmQDWa1r9vapePUUXLjCC96pLzUV083wNWXPTFG9pbsODJlnakNXb7bUJvhCrju1D8N4q7cbw1naa2/T+U/wD6jNtvvH6/w31lfU6qzTkn3XJr1RY6fV4tRG+Od/r8lflwZMU7XhJJDUAGBRPPI8iYkVPQAAAAAAAAAAAAAAAAAAAAAAAAAADyn2i6X4F0q0ViFynPhyVVfGvnlP1bKDiWDlvzx2n6ug4bn5sfLPev0a/R7vDRQ5qbTutul67PVNBvvFop54x9yXy5P5rB1vDNV4+CJnvHSXKa3B4WWY8p6wy61qMba3q3EllUacqmP3mlwj83hfMnXty1mUalea0V9r56u9SqV6069aW/Oo96T6LtGK6RS4JFBmtN53l0GOK468tW10u+w0isz4t07Fk8na6NqDi1KLw1y7PvF+RAxZb6fJF6TtMf3ZhqcEZK7T2eh2tZThGa5SSf+B32DLXNjrkr2mN3K5KTS01nyXVqsYxcptRjFNylJpJJdWzZMxWN5YxE2naO7gdoNqZV26du3ClylPip1P8A1j939jm+IcTm/oYp6e32/Z0Wg4bGP8TL1t7PKPuzbHXU1WVNZcZJ5XRJLmRuEZckaiKx2nfdnxXFWcU3nvDuzrnMgAAAAAAAAAAAAAAAAAAAAAAAAAAaPbPSP0m0qQiszh+tpd/Ejn3V6rMfmR9Vi8XHNUnS5vCyxby7S8Xt7rDTRzF8e8Omrk2l1Wyu1qpXVOM3ilVxSm30k37k35J8PSTZL4Z+Bk69p/sIvEcVc2LeO8df5dp7SaEp6VdKHOMIVX/JTqQqS/sxZf543xzCh007ZYeCU5FHMLndMtquDReu7ZSzqNHvOhWajEn47c0PUtIu40bKFWtLdilKWX2cnhJdX5HT8NtGHRVnJO0dZ/WXNavHOTVWrjjefs4vXtcqXcscadKLzGnni+0p935cl9ym1/ErZ/Rr0r9fevNFoK4I3nrb6e5FsLKdWap0o70n9EuspPoiBgwXz35KR1Ss2amGvNaej0bQ9GhbQwvenL4544vyXZeR2Gj0VNNTavfzly2r1d9Rbee3lDZkxEAAAAAAAAAAAAAAAAAAAAAAAAAAAAeIe0PSP0W8k4rFO4zXp9k2/fj8pPPpJFHrMPJfeO0rzSZ+fH17x0/hyVaWVg0VjZI5nq/s824pXFKNjeySrKPhQlU+C5p4wll/0mODT5811SudPmi9dp7qfU4JrPNXt9HFbZ7D17GpKdGEq1s25QnFOcqK/cqLmkukuTXPiRtRp5jrHZJwaiLxtPdzdKfYr7QmREui2ftJylGc1KFNcW8YlNdoZ5+vJfZxssY69b/eUjFzz6n2h1eo3k6zjv8AuxprdpUo/BCK4JLu8dSFqddfNtHasdo9iRp9NTBvt1me8+1TT9PnWqKnTXF8W38MY9ZPyMNLpr6i/JVlqNRXBTnt/t6Ho+lU7eG7BZbw5zfxSf5Lsjs9Lpcenpy0+M+1ymp1N89+a3wj2J5JRwAAAAAAAAAAAAAAAAAAAAAAAAAAAADnNvdB/TLSUYr9bSzWo93JLjD+ssr1w+hH1OLxKbebfp8vh338ngcmUq5lgnRyZxbZ5tu7vZjb69oQVKpu3UY4UXWcvFiu3iL4l6pvzN8cQmkderV/19Mk79vc3lxrM62J+DRoOXFuFKDqfObWfpgqtVxTJadqbR7u/wA1jg4dixx6Uzb39vkjRWeLbbfNt5ZT3vNp3lN6RG0JFrbSqTVOmsyk8Lt5t9kZ4MF894pSOrVly1xVm9p6Q9A0bS4W9Pdjxk8Oc+spfkuyO30ejppsfLXv5z7XK6rU21F+a3byj2NgS0YAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAPnXauz8K+uqS4KNeo4rliEnvxX0kijz15ckwu8NubHEoFCllka1tkikbui0y0UcN8yuzZJnpCdjptDbxqkOapEM9ORrmCYd7stpip0lUkvfqpS9Ic1H8/9DsOE6OMOHnmPSt9PY5fiWpnLk5Y7R9W8LZXAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA8I9pdLd1W4/iVCf/AIoL8Uym1kbZJW2kn8OGp0+PFFZlnos8UdXRUI8CutPVNquWcnjJudCs/FrU6fSUlvfyLjL7I2aTD42etPz6+7zaNXm8LDa3938np6R3TjlQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA8R9qq/3nL/o0X9mVOu9f4LXRf4/i1Gl08tFNnnouMMOjpU+BWWt1TIheqJ5zPejrdiLf9ZUn+7BRX9Z/wDyXfAac2W9/ZG3z/0pOMZPQrX2z9HZHUKAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAADw/2oSzqlT+GnQj/Zz+ZUa6fxFvov8AGh6NDiUWpldYYdLSiVlpbrTsyqmY7seZ1+xkMQqPvKK+i/xOp/8An4/CvP5/soOLTvesfk6M6BUuX2q2ypWj8KOKlbGdzPuwT5Ob7+XP0IWq1kYY2r1sn6PQzn9K07V+vu/lztjtTdVHvueFnhFRio/Q5vUcT1UW3i/6RsvJ4dpoptFf16u30XVPGjiWFJLPDk13LrhnEv8AlRy36Wj9VBq9L4M9OzZluhgAAAAAAAAAAAAAAAAAAAAAAAAAAY61eEFmcowXeUlFfcxtetI3tMR72VaWtO1Y39y2ld05fBOEv5ZRl+BhTPjv6ton3TD22K9PWrMfB4j7Sl/va481Qa9PCh/iVeu/ySttD/jj4seicyi1K6wulolZZlZIijXLVMux2Tp4t979+cpfJYj+R2vA8fJpd/bMz+37Of4nbfPt7Ij+f3aH2g7bq0i6Fu1KvJcXzjRi+r7z7L5vonM1Gp5PRr3+jHS6Xn9O/q/X7PJdNU69Ryk3LMnKcpNtyk+Ly3zZSai8Ujee69w15p6dncWNLdSRQ5bbymX7bOn2Zy68cckpOXpjH4tE3glLTq4mO0b7/JU8R2jDO/5OzO4c8AAAAAAAAQrjV7en/wAStSi+zqR3vpnIGWxvqdaO/RnGpHLjvReVvLmgJAAAAAAAAAAAAAAAHPbbbRqxt96OJVarcKMXyzjjN+SX3aXUj6nN4VN/NI02Hxb7T283l9vq06knOtOVScucpPL9PJeS4HKarmyW5rTu6nT8lK8tY2by1rplVkpLZeu6VW0uhccasIzlhLeeVUwuS3lxPaanPXtb59UK8cvkxU9l4QeaU2v4Z+8vqjfbUWvG1oe49Ty94ZXZzhzWfNcSNZv8al+0qSlhGuI6vYjeWw1LaZW9pClbtOp4ac5rDjScuL9Z8eXTr2Otrrq4dPTFj9baPh91XGhnNntkyerv8/s8fut6tWaTcpTbcpNtvi+Mm+pjW3JXmskzXmty1djo+nqnFJLkUuozze26xpSKV2bmmsEGerC3V3Gy9h4dLxJL3quJekP2V+fzOy4Po/Aw89u9uvw8nN8Rz+Jk5Y7R9fNui4V4AyBrda123tIxlc1Y01UluQTy3KXN4S6efJZXcDj9V9sGnUc7s3Va6RcWs/1cv7AchqXt75q3tl5Obc1+MfwA5fUPbNqdXhTcaSfSMY/jhP7gaWttHqNy/wBdc1Gn0c3JffIHe+zz2eVLvdubyc/0f4oqTalX/ly+EP4uvTug9xtbaFKEadKMYQglGMIpKKXZIDKAAAAAAAAAAAAABkDyf2yuX6Ra5+Hwqu723t6O99twrOIb9Fnw+elvg4q2qlPeq2pZu7C8xzIOXFul0vv0lvLe78yDfG9mm6dSvX3NXLMNFsMJUL7uexe0d2mcDJv058JRX5/U20vSZ6ww5b09WXHbcUPBhF037km446qXNceq5/QstLSs3bvHtanVpdBopPL5y4s26q0z0jsz08ebq6L4FTZLlutn7DxamZfBTxKX8T6R/v8AL1LLhWi8fLzW9Wv6/krOIanwce0etPb+Xc+OjsocyeMj0UddAafajaqhYUHXrvvGnTTSnVqYyox/N8kgPmHbTa6vqFeVWrLn7qjHO5GC5U4LpFfd8WBzQFUBmovAHuXsy9mTko3epQ3YvEqVpJYlJc1Kuui/g+vYD2eOEsLglwSXJIC7IDIFMgMgVyAyAyAyAyBTIFHIC1zAp4gB1ANHtVodK+o+FUbhKL36VVLMoT5cuqfVfmkzVmxRlrtLbiyzjtvDy2/2JvqLe7CNeKz71Gabx5wliWfJJlVk0OSO3VZ49Zjnv0aipUlSe7VhOk+1WEqbfpvLiQsmnvHeE6mWJ7Sl2+o+ZEvhSa5Wwo6p5ke2nbYyxKZS1NGi2CWW9ZTaV+u5pthl5NIlpNtb6n4EI1HPjUzBQjvPejF4z2jxWWWXCsN5vMx5Qh6u1cVY385aOxuksNErJje4rt1/tmEIOU3hJfV9l5kOujvkvy1SL6imOnNZsNJ2we6o04Sxz9W+p1Wn08YMcUq5jUZpy3m9nRWeuVJc4tepKRpbOlqUupkxQ9f2qpWlB1674LhCCxv1J9IRXfz6Liz0fO+121Fe/ryrVpcPhhCLe5Tp54Qj5d3zb49kg0AFAMttQnUnGnTjKcptRhCCcpSk+SSXNge/+zH2YQtNy7v4xqXPCdOk8Sp275p9pVF35Lp3A9UjMC+MgL1IBvAMgMgVTAuTAAW7wFrkBRyAtcwMbmBjlUAwzuUgIVfUYrqBqb3aCMepju9iHH7QbcQUXFqM0/2ZJST9U+BhMbs4nbq8r1jXZTnmjTp26zzgt37Lh9jDwKT3hs/5WSO0o9trlSHGVeUv4VGLX1wa7aTFb/yzprMtf/SdT2unnEYOX2ZHtwyk+aRXiV48m5sNfr1Pgtq0n8kvqyNbhkb+tCVHE+nqy3ltoVxcrNyvD6KKecLtklYdPXDG1ETNntmne7Z2OwdOKxv1Mdt/P4m2cMXneYaq57UjaJltKeyNrDEqiUscU6s3JL0TeDbjw1p2hqyZrX9aUyErWnwjuvHSEfz5G6IaZsxz1mC+GPzb/JGWzFrr/bGFvBzqqLS4KMXicn2SPR49tVtJVvazq1HiKzGnTTe5Th+6u/TL6vywkGjbAoBO0bR693VVG1pSqzl0iuCX70nyivN8APon2d+z6jp0FUnu1rqS9+tj3aafOFLPJd5c35LgB3UUBegLkwL94CqYFQGQLkBcBXIGFyAtcgLJSAxyqAR6lYCHWrsDW3VeXmBodQqz6ZMRy+p29aeUsgc/W2XrTfJnj3ZWj7PZyfvZPN3uzc2Ps1gviWTzeWW0Ol0/YihT/YX0MeWZe80QkX1e2tJRpzXvSjvKMY/s5xlvpxyPD9r2ciLPaVf0cYrzk978MGUVYzbdBudoKj51N1eWIfgZbMZlpq1/JvKnOTffj+PP5GWzzdY76fdL048PyfyPXiLfajGnFyqSbx3eW+2I8mBwesatOvLLeIrKjBfDFeX5sDWgVSAyQS6rP4fYDufZrtNGwrzqyinGpSlScVwfGUZJ/Ldf1A9Ys/aRQqclu+oG3t9rKUuTAn0tag+TAlU9Ri+oEiF0mBljWQF6qAXqQF6YFyYFQIzYFrYGNgY5RAxukBjlbgYZ2SYGGWmRfQC3/ZUOx5sL46bHshsbssbJdjzY3ZI2q7DlN2RW6PdhC1HQqNdYq04z7Nr3l6Pmj0cPrPs0km5WdaUXz8OrmS9FJcV88gcTqdjeWj//AE28ml/SwW9H13o8l/NgCHS1WnL4ZJZ44lyfp0+gGO5vd2O9JqKXJ5y35YX97A5LUr+VWXXCzurhhL5AQsAXJAZaUV1WfwAzpN9EvJICRRosDZWqaA3tjdTXVgdBY6jNY4sDf2eqS7gbu11FvqBtKF6BOpXIEqnXAzwqAZVMC7eAxtAUwBTAFN0BugU3AG4BTcAeGA3AK7gFVAC5QAr4YFrpgY6lunwaT9QOS1/2cWFzmTpKlN8XUo/q5Z7vHB/MDzDaP2UXNP8A5etGtDOVGrmEl81lP6IDk7rY24p/Gs/y8gIMtDmuaYBaW10AyQ099gJFOx8gJdKyAnULMDYW9oBs7a3A2tvSA2ttEDZ0GBsaEgJ1KYEqnMCRCYF+8BkQFcAUwAwAwAwBTADADAFcAFEC9QAvUALt0CxoDG0BimBBuaOQNDfaXF9AOfvdAi+gGmudnl2Ag1NC8gMb0fHQC+Ol+QGenp4EulY+QE2jaATqNqBOo0AJtKkBMpQAlU0BIgBngBkAzxAuwAwAwAwAwAAoAAAZEgL0gLgKNgY2BZIDHJAYakAI1WiBCrWuQINax8gIlTT12Ajz01dgMT05dgKrT/IDJGx8gM0LTyAzwtgJFOgBIhSAkQgBmhADNGIGWKAuAzoC+IFQAACjAtAAAAFEBUCgFoFrAskBjkBgkBgqARKgESYEaoBgmBYBcuYGWAEimBJp/kBKgBmiBkiBmiBkiBkQGQD/2Q==" alt ="image not found" width ="50px" height ="50px">

            <br>
            <br>

            <input type ="text" id ="email" name ="email" placeholder = " Enter registered E-mail ">
            <span id ="sp"> <?php echo $emailError; ?></span>
            
            <br>
            <br> 

            <input type ="submit" id ="submit" value ="submit" name ="submit">

        </form>
    </div>
</body>

</html>