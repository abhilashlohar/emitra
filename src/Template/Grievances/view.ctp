<?php
require_once(ROOT . DS  .'vendor' . DS  . 'AES.php');

//$str = "EmitraNew@2016";
$str = "E-m!tr@2016";


$hashkey = substr(hash('sha256', $str),0 ,16);

$inputText = 'Test';
$inputKey = $hashkey;
$blockSize = 128;
$Mode= 'cbc';
$aes = new AES($inputText, $inputKey, $blockSize, $Mode);
$aes->setIV($hashkey);
$enc = $aes->encrypt();
$enc='ELNJOXDH9zon/9qKclYzTLTLd3BHPSvI7tglugHzp7M8AkCLfGohln8L3h4nn1k+pPv93oX/FwCvQI+QYNILvPYhfXhl2ZmiG9nj9GZGcAU=';

$aes->setData($enc);
$dec=$aes->decrypt();

echo "After encryption: ".$enc."<br/>";
echo "After decryption: ".($dec)."<br/>";

?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Grievance'), ['action' => 'edit', $grievance->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Grievance'), ['action' => 'delete', $grievance->id], ['confirm' => __('Are you sure you want to delete # {0}?', $grievance->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Grievances'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Grievance'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="grievances view large-9 medium-8 columns content">
    <h3><?= h($grievance->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Subject') ?></th>
            <td><?= h($grievance->subject) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($grievance->id) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($grievance->description)); ?>
    </div>
</div>
