 <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
 <style type="text/css">
   .custom-color{
  margin: 5px 0;
  border-radius: 0;
  font-weight: bold;
  
  
  background: rgb(215,215,215);
background: -moz-linear-gradient(0deg, rgba(215,215,215,1) 45%, rgba(242,242,242,1) 45%);
background: -webkit-linear-gradient(0deg, rgba(215,215,215,1) 45%, rgba(242,242,242,1) 45%);
background: linear-gradient(0deg, rgba(215,215,215,1) 45%, rgba(242,242,242,1) 45%);
filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#d7d7d7",endColorstr="#f2f2f2",GradientType=1);
}
 </style>
<div class="content-wrapper">  
  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
          <h2 class="add_button">
              <button onclick="javascript:location.reload(true)" type="button"
              class="btn bg-green btn-circle-lg waves-effect waves-circle waves-float right m-t--5"
              data-backdrop="static"
              data-keyboard="false"><i class="fa fa-chevron-left" style='font-size:15px;color:green' aria-hidden="true"></i> Back</button>
          </h2>

  <div class="row">
    <div class="col-12 col-md-6">
      <div class="card">
        <div class="card-body p-5">
        <h4> Service Type: <?= $approval_chain[0]->service_type;?></h4>
          <ul class="list-group">
          <?php foreach($approval_chain as $chain_value):?>
        <li class="list-group-item custom-color">
          <i class="fas fa-arrow-down" style="margin-right:10px"></i><?= $chain_value->designation_name;?>
        </li>
      <?php endforeach;?>
        
      </ul>
        </div>
      </div>
    </div>
  </div>

      </div>
  </div>
</div>
</div>		