<?php
if (isset($_POST['name']) || isset($_POST['title_make_up'])){
    $site = $_SERVER["SERVER_NAME"];
    $from_mail = "admin@$site";
    if(isset($_POST['email']))
        $to = "nn-diamond@ya.ru".$_POST['email']; // почта 
    else
        $to = "nn-diamond@ya.ru"; // почта
    $subject = "Заявка c сайта $site";
if(isset($_POST['name'])) {
    $message = ' Имя: ' . $_POST['name'];
}
    if(isset($_POST['tel'])){
        
		$message .= ' <br> Телефон: ' . $_POST['tel'];
    }
    $message .= " <hr>";
    switch ($_POST['number_form_site']){
        case 1:
            $message .= ' <br>ЗАКАЗАЛИ ОБРАТНЫЙ ЗВОНОК!';break;
        case 2:
            $message .= ' <br>Узнать подробнее';break;
        case 3:
            if(isset($_POST['title_make_up'])){
                $message .= ' <br> Услуга / Товар: ' . $_POST['title_make_up'];
            }
            $message .= ' <br>Получить макет бесплатно';break;
        case 4:
            if(isset($_POST['number_task_order'])){
                $message .= ' <br> Название макета: ' . $_POST['number_task_order'];
            }
            $message .= ' <br>Заказать подобный макет';break;
        case 5:
            if(isset($_POST['number_lp_order'])){
                $message .= ' <br> Название пакета: ' . $_POST['number_lp_order'];
            }
            $message .= ' <br>Узнать подробнее';break;
        case 6:
            if(isset($_POST['question'])){
                $message .= ' <br>Вопрос: ' . $_POST['question'];
            }
            $message .= ' <br>Вопрос менеджеру';break;
        default:

    }
    $message .= "<br>Проверочная ссылка: ".$site.$_SERVER["REQUEST_URI"];
    $headers  = "MIME-Version: 1.0\r\nContent-type: text/html; charset=utf-8\r\n";
    $headers .= "From: $from_mail\r\n";
    mail($to, $subject, $message, $headers);
    echo('<script type="text/javascript">
    function ready (){
        document.getElementsByClassName("modalMain")[0].classList.remove("hide_block");
        setTimeout(function(){
            document.getElementsByClassName("modalMain")[0].classList.add("hide_block");
        },2000);
    }
    document.addEventListener("DOMContentLoaded", ready);
</script>'
    );
}
echo "<pre>";
//    print_r($_POST);
echo "</pre>";
?>





