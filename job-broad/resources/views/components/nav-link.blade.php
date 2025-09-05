       @props(["active"=>false])
       
       @php
            $current = "bg-blue-950/50 text-white";
            $default = "text-gray-200 hover:bg-white/5 hover:text-white";
        @endphp

              <a class="rounded-md px-3 py-2 text-sm font-medium text-white {{ $active ? $current : $default }}" {{ $attributes }}>
              {{ $slot }}
            </a>