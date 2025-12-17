@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-[#333] focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-md bg-[#1e1e1e] text-gray-200']) }}>
