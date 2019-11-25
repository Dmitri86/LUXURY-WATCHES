<?php


namespace app\models;


use ishop\App;
use RedBeanPHP\R;
use Swift_Mailer;
use Swift_Message;
use Swift_SmtpTransport;

class Order extends  AppModel {

    public static function saveOrder($data){
        $order = R::dispense('order');
        $order->user_id = $data['user_id'];
        $order->note = $data['note'];
        $order->currency = $_SESSION['cart.currency']['code'];
        $order_id = R::store($order);
        self::saveOrderProduct($order_id);
        return $order_id;

    }

    public static function saveOrderProduct($order_id){
        $sql_part = '';
        foreach ($_SESSION['cart'] as $product_id => $product){
            $product_id = (int)$product_id;
            $sql_part .= "($order_id, $product_id, {$product['qty']}, 
            '{$product['title']}', {$product['price']}),";
        }
        $sql_part = rtrim($sql_part, ',');
        R::exec("INSERT INTO order_product (order_id, product_id, qty, title, price) 
VALUES $sql_part");

    }

    public static function mailOrder($order_id, $user_email){
        // Create the Transport
        $transport = (new Swift_SmtpTransport(App::$app->getProperty('smpt_host'),
            App::$app->getProperty('smpt_port'), App::$app->getProperty('smpt_protocol')))
            ->setUsername(App::$app->getProperty('smpt_login'))
            ->setPassword(App::$app->getProperty('smpt_password'));

        // Create the Mailer using your created Transport
        $mailer = new Swift_Mailer($transport);

        // Create a massage
        ob_start();
        require APP . '/views/mail/mail_order.php';
        $body = ob_get_clean();

        $message_client = (new Swift_Message("Your order №{$order_id}"))
            ->setFrom([App::$app->getProperty('smpt_login') => App::$app->getProperty('shop_name')])
            ->setTo($user_email)
            ->setBody($body, 'text/html');

        $message_admin = (new Swift_Message("Order №{$order_id} has been created"))
            ->setFrom([App::$app->getProperty('smpt_login') => App::$app->getProperty('shop_name')])
            ->setTo(App::$app->getProperty('admin_email'))
            ->setBody($body, 'text/html');

        // Send the message
        $result = $mailer->send($message_client);
        $result = $mailer->send($message_admin);
        unset($_SESSION['cart']);
        unset($_SESSION['cart.qty']);
        unset($_SESSION['cart.sum']);
        unset($_SESSION['cart.currency']);
        $_SESSION['success'] = 'Thanks for yor order. Our manager will connect with you soon.';

        redirect();


    }

}