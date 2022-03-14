<button {{ $attributes->merge(['type' => 'button', 'class' => 'btn btn-dark', 'data-bs-toggle' => 'modal']) }}>
  {{ $slot }}
</button>