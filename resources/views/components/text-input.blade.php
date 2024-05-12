@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 focus:border-[#4E9F3D] focus:ring-[#4E9F3D] rounded-md shadow-sm focus:text-black']) !!}>
