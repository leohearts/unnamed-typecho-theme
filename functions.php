<?php
function themeFields($layout) {
    $Cover = new Typecho_Widget_Helper_Form_Element_Textarea('Cover', NULL, NULL, '自定义缩略图', '输入缩略图地址');
    $layout->addItem($Cover);
}

function themeConfig($form)
{

    $background = new Typecho_Widget_Helper_Form_Element_Text('background', NULL, 'https://leohearts.com/usr/uploads/2020/09/324859977.webp', '博客默认封面图', '在这里填入一个图片URL地址, 给博客添加一个默认封面图');
    $form->addInput($background);

    $function = new Typecho_Widget_Helper_Form_Element_Checkbox(
        'function',
        array(
            'LinkinNewtab' => '在新标签页打开外链'
        ),
        array('LinkinNewtab'),
        '功能开关'
    );
    $form->addInput($function->multiMode());
}