
    @can('view-sidebar')
        <div id="sidebar">
            <sidebar-component role="notUser"></sidebar-component>
        </div> 
    @endcan 
    @cannot('view-sidebar')
        <div id="sidebar">
            <sidebar-component role="user"></sidebar-component>
        </div>  
    @endcannot
