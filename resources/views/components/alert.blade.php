<div style="padding: 12px 20px; background-color: {{ $type === 'success' ? '#d4edda' : ($type === 'error' ? '#f8d7da' : '#d1ecf1') }}; border: 1px solid {{ $type === 'success' ? '#c3e6cb' : ($type === 'error' ? '#f5c6cb' : '#bee5eb') }}; color: {{ $type === 'success' ? '#155724' : ($type === 'error' ? '#721c24' : '#0c5460') }}; border-radius: 8px; margin-bottom: 20px;">
    {{ $slot }}
</div>
