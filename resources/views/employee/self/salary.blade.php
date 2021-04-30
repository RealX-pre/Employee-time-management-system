@extends('layouts.app')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Цалингийн хуудас</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="#">Нүүр хуудас</a>
                    </li>
                    <li class="breadcrumb-item active">
                        Цалингийн хуудас
                    </li>
                </ol>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>


<section class="content">

  <div class="salary-slip" >
      <tr>
            <table class="empDetail">
                <td colspan='2'>
                  <img height="75px" src='/img/partner1.png' /></td>
                <td colspan='10' class="companyName">Компани</td>

              <tr>
                                <h1><th colspan="2">
                  Ажилчны дугаар:
      </th></h1>
                <td>
                  {{ Auth::user()->employee->id }}
      </td>
                <td></td>
                               <th colspan="2">
                  Овог:
      </th>
                <td>
                  {{ Auth::user()->employee->last_name }}
      </td>
                <td></td>

                                    <th colspan="2">
                                  Нэр:
                      </th>
                                <td>
                                  {{ Auth::user()->employee->first_name }}
                      </td>
                                <td></td>
                 </tr>


              <tr>
                                <th colspan="2">
                  Хүйс:
      </th>
                <td>
                  {{ Auth::user()->employee->sex }}
      </td>
                <td></td>
                                <th colspan="2">
                  Салбар:
      </th>
                <td>
                  {{ Auth::user()->employee->department->name}}
      </td>
                <td></td>
                                <th colspan="2">
                  Мэргэжил:
      </th>
                <td>
                  {{ Auth::user()->employee->desg}}
      </td>
              </tr>
              <tr>
                               <th colspan="2">
                  Төрсөн огноо:
      </th>
                <td>
                   {{ Auth::user()->employee->dob->format('d M, Y')}}
      </td><td></td>
                                <th colspan="2">
                  Бүртгүүлсэн огноо:
      </th>
                <td>
                  {{ Auth::user()->employee->join_date->format('d M, Y')}}
      </td><td></td>
                                <th colspan="2">
                  Дансны дугаар:
      </th>
                <td>
                    <input type="text" id="bank" name="bank">
      </td>
              </tr>
              <tr>
                                <th colspan="2">
                  Банкаа сонгоно уу:
      </th>
                <td>
                      <div class="form-group">

                                    <select name="bank" class="form-control">

                                        <option value="bank">Хаан банк</option>
                                        <option value="bank">Хас банк</option>
                                        <option value="bank">Худалдаа хөгжлийн банк</option>
                                        <option value="bank">Голомт банк</option>
                                        <option value="bank">Богд банк</option>
                                        <option value="bank">Төрийн банк</option>
                                        <option value="bank">Кредит банк</option>
                                        <option valueч="bank">Ариг банк</option>
</td>
            </table>
</tr>
<tr>
<th colspan="2">
  <form name="employeeInfoForm" action="" onsubmit="return generatePayslip(this['salary'].value);" method="post">
	 <fieldset>
		<label for="salary">Цалингийн хэмжээ (төг):</label>
		<input type="text" id="salary" class="form-control" name="salary" placeholder="Үндсэн цалин оруулах" />
		<br />
		<button type="submit" class="btn btn-primary">Цалин бодох</button>
	 </fieldset>
  </form>



  <form name="payForm" action="" onsubmit="" method="post">
		<input type="hidden" id="monthlyValue" name="annual"  />
		<input type="hidden" id="socialValue"  name="gross" />
		<input type="hidden" id="healthyValue" name="tax" />
		<input type="hidden" id="netValue"  name="net"/>
		<table class="table table-striped">
			<tbody>
			  <tr>
				<td>Хугацааг оруулах:</td>
				<td> <label for=""> </label>
                                                        <input type="text" name="date_range" id="date_range" class="form-control" size="28">
                                                        @error('date_range')
                                                        <div class="text-danger">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror</td>
			  </tr>
			  <tr>
				<td>Төрөл:</td>
				<td>Сарын цалин</td>
			  </tr>
			 <tr>
				<td>1 сарын цалин:</td>
				<td id="monthly" ></td>
			  </tr>
			  <tr>
				<td>Нийгмийн даатгал 13%:</td>
				<td id="social" ></td>
			  </tr>
			  <tr>
				<td>Эрүүл мэндийн даатгал 3%:</td>
				<td id="healthy" ></td>
			  </tr>
			  <tr>
				<td>Цалин:</td>
				<td id="net" ></td>
			  </tr>
			</tbody>
		</table>


  </form>




    <script>

	function round(number){
		if (number%1 >= 50)
			return Math.ceil(number);
		else
			return Math.floor(number);
	}



    function generatePayslip(salary, superrate){
		  document.querySelector("#monthly").textContent = Number(salary);
    	  document.querySelector("#monthlyValue").value = Number(salary);
    	  social = (salary * 13)/100;
    	  document.querySelector("#social").textContent = social;
    	  document.querySelector("#socialValue").value = social;
    	  healthy = (salary*3)/100;
    	  document.querySelector("#healthy").textContent = healthy;
    	  document.querySelector("#healthyValue").value = healthy;
	      net = salary - (healthy + social);
	      document.querySelector("#net").textContent = net;
	      document.querySelector("#netValue").value = net;


      return false;
    }

    $(document).ready(function() {
        $('#date_range').daterangepicker({
            "locale": {
                "format": "DD-MM-YYYY",
            }
        });
        $('#date').daterangepicker({
            "singleDatePicker": true,
            "locale": {
                "format": "DD-MM-YYYY",
            }
        });

    });
    function showDate() {
        $('#range-group').toggleClass('hide-input');
        $('#date-group').toggleClass('hide-input');
        $('#half-day').toggleClass('hide-input');
    }


    </script>



                    <!-- this row will not appear when printing -->
                    <div class="row no-print">
                        <div class="col-12">

                            <button
                                onclick=myfun()
                                type="button"
                                class="btn btn-success float-right"
                            >
                                <i
                                    class="fas fa-print"
                                ></i>
                                Print
                                <script type="text/javascript">
                                function myfun(){
                                window.print();
                                }
                                </script>
                            </button>

                        </div>
                    </div>
                </div>
                <!-- /.invoice -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection
