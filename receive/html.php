<?php
echo '<form method="POST" action="https://yoomoney.ru/quickpay/confirm.xml">
    <input type="hidden" name="receiver" value="410012805268432"/>
    <input type="hidden" name="formcomment" value="UI/UX Марафон : оплата разбора домашнего задания"/>
    <input type="hidden" name="short-dest" value="UI/UX Марафон : оплата разбора домашнего задания"/>
    <input type="hidden" name="label" value="Оплата марафона"/>
    <input type="hidden" name="quickpay-form" value="shop"/>
    <input type="hidden" name="targets" value="Оплата марафона"/>
    <input type="hidden" name="sum" value="990" data-type="number"/>
    <input type="hidden" name="need-fio" value="false"/>
    <input type="hidden" name="need-email" value="true"/>
    <input type="hidden" name="need-phone" value="true"/>
    <input type="hidden" name="need-address" value="false"/>
    <input type="hidden" name="paymentType" value="AC"/>
</form>';