<li class="nav-item has-treeview">
    <a href="#" class="nav-link">
        <i class="nav-icon fa fa-clock-o"></i>
        <p>
            Цаг бүртгэл
            <i class="fas fa-angle-left right"></i>
            <span class="badge badge-info right">2</span>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a
                href="{{ route('employee.attendance.create') }}"
                class="nav-link"
            >
                <i class="far fa-circle nav-icon"></i>
                <p>Ирц бүртгүүлэх</p>
            </a>
        </li>
        <li class="nav-item">
            <a
                href="{{ route('employee.attendance.index') }}"
                class="nav-link"
            >
                <i class="far fa-circle nav-icon"></i>
                <p>Цаг бүртгэлийн жагсаалт</p>
            </a>
        </li>
    </ul>
</li>
<li class="nav-item has-treeview">
    <a href="#" class="nav-link">
        <i class="nav-icon fa fa-calendar-minus-o"></i>
        <p>
            Ажлын чөлөө
            <i class="fas fa-angle-left right"></i>
            <span class="badge badge-info right">2</span>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a
            href="{{ route('employee.leaves.create') }}"
                class="nav-link"
            >
                <i class="far fa-circle nav-icon"></i>
                <p>Чөлөө авах</p>
            </a>
        </li>
        <li class="nav-item">
            <a
            href="{{ route('employee.leaves.index') }}"
                class="nav-link"
            >
                <i class="far fa-circle nav-icon"></i>
                <p>Чөлөөний жагсаалт</p>
            </a>
        </li>
    </ul>
</li>
<li class="nav-item has-treeview">
    <a href="#" class="nav-link">
        <i class="nav-icon fa fa-calendar-minus-o"></i>
        <p>
            Зарлагын хүсэлт
            <i class="fas fa-angle-left right"></i>
            <span class="badge badge-info right">2</span>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a
            href="{{ route('employee.expenses.create') }}"
                class="nav-link"
            >
                <i class="far fa-circle nav-icon"></i>
                <p>Хүсэлт гаргах</p>
            </a>
        </li>
        <li class="nav-item">
            <a
            href="{{ route('employee.expenses.index') }}"
                class="nav-link"
            >
                <i class="far fa-circle nav-icon"></i>
                <p>Хүсэлтийн жагсаалт</p>
            </a>
        </li>
    </ul>
</li>
<li class="nav-item has-treeview">
    <a
    href="{{ route('employee.self.holidays') }}"
     class="nav-link">
        <i class="nav-icon fa fa-thumb-tack"></i>
        <p>Баярын амралт
            <i class="fas fa-angle-left right"></i>
            <span class="badge badge-info right">3</span>
        </p>
    </a>
</li>

<li class="nav-item has-treeview">
    <a
    href="{{ route('employee.self.salary_slip')}}"
    class="nav-link">
        <i class="nav-icon fa fa-address-card"></i>
        <p>
            Цалингийн хуудас
            <i class="fas fa-angle-left right"></i>
            <span class="badge badge-info right">3</span>
        </p>
    </a>
    </li>

