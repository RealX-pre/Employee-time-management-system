<?php

use App\Attendance;
use App\Department;
use \DateTime as DateTime;
use App\Role;
use App\User;
use App\Employee;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('role_user')->truncate();
        DB::table('employees')->truncate();
        DB::table('departments')->truncate();
        DB::table('attendances')->truncate();
        $employeeRole = Role::where('name', 'employee')->first();
        $adminRole =  Role::where('name', 'admin')->first();

        $admin = User::create([
            'name' => 'Админ',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin')
        ]);

        $employee = User::create([
            'name' => 'Дашням Жамъянпүрэв',
            'email' => 'kabalulaka2@gmail.com',
            'password' => Hash::make('Qwe01020102')
        ]);

        //
        $employee->roles()->attach($employeeRole);
        $dob = new DateTime('1999-06-10');
        $join = new DateTime('2021-02-25');
        $admin->roles()->attach($adminRole);
        $employee = Employee::create([
            'user_id' => $employee->id,
            'first_name' => 'Жамъянпүрэв',
            'last_name' => 'Дашням',
            'dob' => $dob->format('Y-m-d'),
            'sex' => 'эрэгтэй',
            'desg' => 'Программист',
            'department_id' => '2',
            'join_date' => $join->format('Y-m-d'),
            'salary' => 880000
        ]);

        Department::create(['name' => 'Дотоод хяналт шалгалтын алба']);
        Department::create(['name' => 'Мэдээлэл технологийн хэлтэс']);
        Department::create(['name' => 'Санхүү, эдийн засгийн хэлтэс']);
        Department::create(['name' => 'Төлөөлөн удирдах зөвлөл']);
        Department::create(['name' => 'Техникийн бодлогын хэлтэс']);
        Department::create(['name' => 'Худалдаа хангамж хариуцсан хэлтэс']);
        Department::create(['name' => 'ХАБ, эрүүл ахуйн хэлтэс']);
        Department::create(['name' => 'Захиргаа, хүний нөөц, удирдлагын хэлтэс']);
        Department::create(['name' => 'Судалгаа хөгжлийн хэлтэс']);
        Department::create(['name' => 'Үйлдвэр, борлуулалтын алба']);

        // Attendance seeder
        $create = Carbon::create(2020, 8, 17, 10, 00, 23, 'Asia/Kolkata');
        $update = Carbon::create(2020, 8, 17, 17, 00, 23, 'Asia/Kolkata');
        for ($i=0; $i < 4; $i++) {
            $attendance = Attendance::create([
                'employee_id' => $employee->id,
                'entry_ip' => '123.156.125.123',
                'entry_location' => 'Урт цагаан түц, Урт цагааны гудамж, Гандан, Улаанбаатар, Sukhbaatar Duureg, 15172, Монгол улс ᠮᠤᠩᠭᠤᠯ ᠤᠯᠤᠰ'.$i,
                'created_at' => $create
            ]);
            $attendance->exit_ip = '151.235.124.236';
            $attendance->exit_location = 'Урт цагаан түц, Урт цагааны гудамж, Гандан, Улаанбаатар, Sukhbaatar Duureg, 15172, Монгол улс ᠮᠤᠩᠭᠤᠯ ᠤᠯᠤᠰ'.$i;
            $attendance->registered = 'yes';
            $attendance->updated_at = $update;
            $attendance->save();
            $create->addDay();
            $update->addDay();
        }
    }
}
