<?php
function themeFields($layout) {
$Cover = new Typecho_Widget_Helper_Form_Element_Textarea('Cover', NULL, NULL, '自定义缩略图', '输入缩略图地址');
$layout->addItem($Cover);
}