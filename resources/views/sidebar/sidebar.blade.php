 <nav id="sidebar">
     <div class="sidebar-header">
         <h4>Helpdesk</h4>
     </div>

     <ul class="list-unstyled components mx-3 rounded-4">
         <li class="active rounded-4">
             <a href="{{ route('dashboard') }}"><i class="fas fa-th-large mr-2"></i>Dashboard</a>

         </li>
         <li>
             <a href="{{ route('info-center') }}"><i class="fas fa-info-circle mr-2"></i>Info Center</a>
         </li>

         <li>
             <a href="#"><i class="fas fa-chart-bar mr-2"></i>Reporting</a>
         </li>
         <li>
             <a href="#"><i class="fas fa-user-tie mr-2"></i>Client</a>
         </li>
         <li>
             <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-cog mr-2"></i>Setting</a>
             <ul class="collapse list-unstyled" id="pageSubmenu">
                 <li>
                     <a href="#">Categories</a>
                 </li>
                 <li>
                     <a href="#">Service Level</a>
                 </li>
                 <li>
                     <a href="#">About System</a>
                 </li>
                 <li>
                     <a href="#">Users</a>
                 </li>
                 <li>
                     <a href="#">Group</a>
                 </li>
             </ul>
         </li>
     </ul>
 </nav>