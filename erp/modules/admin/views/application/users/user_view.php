
<table class="spreview">
  <thead ><p style="text-align: center;font-weight: bold;font-size: 22px; background-color:#ddd;padding:5px;"><?= $this->lang->line('user_information')?></p></thead>
  <tbody>
    <tr>
      <th><?= $this->lang->line('name')?></th>
      <td><?= $posts[0]['full_name']?></td>
    </tr>
    <tr>
      <th><?= $this->lang->line('user_name')?></th>
      <td><?= $posts[0]['username']?></td>
    </tr>
    <tr>
      <th><?= $this->lang->line('email')?></th>
      <td><?= $posts[0]['email']?></td>
    </tr>
    <tr>
      <th><?= $this->lang->line('phone_no')?></th>
      <td><?= $posts[0]['mobile']?></td>
    </tr>
    <tr>
      <th><?= $this->lang->line('birth_certificate_no')?></th>
      <td><?= $posts[0]['birth_certificate_no']?></td>
    </tr>
    <tr>
      <th><?= $this->lang->line('nid')?></th>
      <td><?= $posts[0]['nid_no']?></td>
    </tr>
    <tr>
      <th><?= $this->lang->line('birth_certificate_no')?></th>
      <td><?= $posts[0]['birth_certificate_no']?></td>
    </tr>
  </tbody>
</table>

<style>
  .spreview{
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
  }
  .spreview td, th {
    text-align: left;
    padding: 1px 0px 1px 3px;
  }
</style>