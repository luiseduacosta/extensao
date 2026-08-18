<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<?php $this->Form->setTemplates(['legend' => '<legend>{{text}}</legend>']); ?>
<?php $this->Form->setTemplates(['formStart' => '<div class="form-horizontal"><form{{attrs}}></div>']); ?>
<?php $this->Form->setTemplates(['inputContainer' => '<div class="form-group row" form-type="{{type}}">{{content}}</div>']); ?>
<?php $this->Form->setTemplates(['inputContainerError' => '<div class="input {{class}} {{type}}{{required}} error">{{content}}{{error}}</div>']); ?>
<?php $this->Form->setTemplates(['label' => '<label class="col-3 control-label">{{text}}</label>']); ?>
<?php $this->Form->setTemplates(['input' => '<div class="col-8"><input class="form-control" type="{{type}}" name="{{name}}" {{attrs}}/></div>']); ?>
<?php $this->Form->setTemplates(['textarea' => '<div class="col-8"><textarea class="form-control" name = "{{name}}" {{attrs}}>{{value}}</textarea></div>']); ?>
<?php $this->Form->setTemplates(['select' => '<div class="col-8"><select class="form-control" name="{{name}}" {{attrs}}>{{content}}</select></div>']); ?>
<?php $this->Form->setTemplates(['checkboxFormGroup' => '<div class="col-xs-5"><div class="checkbox">{{label}}</div></div>']); ?>
<?php $this->Form->setTemplates(['checkbox' => '<input type="checkbox" value="{{value}}" {{attrs}}>']); ?>
<?php $this->Form->setTemplates(['radio' => '<input type="radio" name="{{name}}" value="{{value}}" {{attrs}}>']); ?>
<?php $this->Form->setTemplates(['radioWrapper' => '{{label}}']); ?>
<?php $this->Form->setTemplates(['submitContainer' => '<div class="form-group row"><div class="col-12">{{content}}</div></div>']); ?>
<?php $this->Form->setTemplates(['inputSubmit' => '<input class = "btn btn-success position-static" type = "{{type}}" {{attrs}}>']); ?>
<?php $this->Form->setTemplates(['dateWidget' => '{{day}}{{month}}{{year}}{{hour}}{{minute}}{{second}}{{meridian}}']); ?>
<?php $this->Paginator->setTemplates(['number' => '<li class="page-item"><a class="nav-link" href="{{url}}">{{text}}</a></li>']); ?>
<?php $this->Paginator->setTemplates(['first' => '<li class="page-item"><a class="nav-link" href="{{url}}">{{text}}</a></li>']); ?>
<?php $this->Paginator->setTemplates(['last' => '<li class="page-item"><a class="nav-link" href="{{url}}">{{text}}</a></li>']); ?>
<?php $this->Paginator->setTemplates(['nextActive' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>']); ?>
<?php $this->Paginator->setTemplates(['nextDisabled' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>']); ?>
<?php $this->Paginator->setTemplates(['prevActive' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>']); ?>
<?php $this->Paginator->setTemplates(['prevDisabled' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>']); ?>
<?php $this->Paginator->setTemplates(['current' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>']); ?>
<?php $this->Paginator->setTemplates(['ellipsis' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>']); ?>
<?php $this->Paginator->setTemplates(['sort' => '<a href="{{url}}">{{text}}</a>']); ?>
<?php $this->Paginator->setTemplates(['sortAsc' => '<a href="{{url}}">{{text}}</a>']); ?>
<?php $this->Paginator->setTemplates(['sortDesc' => '<a href="{{url}}">{{text}}</a>']); ?>
<?php $this->Paginator->setTemplates(['counterRange' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>']); ?>
<?php $this->Paginator->setTemplates(['counterPages' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>']); ?>
