<!DOCTYPE html>
<html>
<head>
    <title>Create Batch</title>

<style>
#erd svg.erDiagram .divider path { stroke-opacity: 0.5; }
#erd svg.erDiagram .row-rect-odd path,
#erd svg.erDiagram .row-rect-odd rect,
#erd svg.erDiagram .row-rect-even path,
#erd svg.erDiagram .row-rect-even rect { stroke: none !important; }
</style>
<div id="erd"></div>
<script type="module">
import mermaid from 'https://esm.sh/mermaid@11/dist/mermaid.esm.min.mjs';
const dark = matchMedia('(prefers-color-scheme: dark)').matches;
await document.fonts.ready;
mermaid.initialize({
  startOnLoad: false,
  theme: 'base',
  fontFamily: '"Anthropic Sans", sans-serif',
  themeVariables: {
    darkMode: dark,
    fontSize: '13px',
    fontFamily: '"Anthropic Sans", sans-serif',
    lineColor: dark ? '#9c9a92' : '#73726c',
    textColor: dark ? '#c2c0b6' : '#3d3d3a',
  },
});
const { svg } = await mermaid.render('erd-svg', `erDiagram
  INSTRUCTORS ||--o{ BATCH_INSTRUCTORS : assigned_to
  BATCHES ||--o{ BATCH_INSTRUCTORS : has
  BATCHES ||--o{ STUDENTS : contains

  INSTRUCTORS {
    bigint id PK
    string name
    string email
    string phone
    timestamps created_at
  }

  BATCHES {
    bigint id PK
    string name
    date start_date
    date end_date
    enum status
    timestamps created_at
  }

  BATCH_INSTRUCTORS {
    bigint id PK
    bigint batch_id FK
    bigint instructor_id FK
    timestamps created_at
  }

  STUDENTS {
    bigint id PK
    bigint batch_id FK
    string name
    string email
    string phone
    date enrolled_at
    enum status
    timestamps created_at
  }
`);
document.getElementById('erd').innerHTML = svg;

document.querySelectorAll('#erd svg .node').forEach(node => {
  const firstPath = node.querySelector('path[d]');
  if (!firstPath) return;
  const d = firstPath.getAttribute('d');
  const nums = d.match(/-?[\d.]+/g)?.map(Number);
  if (!nums || nums.length < 8) return;
  const xs = [nums[0], nums[2], nums[4], nums[6]];
  const ys = [nums[1], nums[3], nums[5], nums[7]];
  const x = Math.min(...xs), y = Math.min(...ys);
  const w = Math.max(...xs) - x, h = Math.max(...ys) - y;
  const rect = document.createElementNS('http://www.w3.org/2000/svg', 'rect');
  rect.setAttribute('x', x); rect.setAttribute('y', y);
  rect.setAttribute('width', w); rect.setAttribute('height', h);
  rect.setAttribute('rx', '8');
  for (const a of ['fill', 'stroke', 'stroke-width', 'class', 'style']) {
    if (firstPath.hasAttribute(a)) rect.setAttribute(a, firstPath.getAttribute(a));
  }
  firstPath.replaceWith(rect);
});

document.querySelectorAll('#erd svg .row-rect-odd path, #erd svg .row-rect-even path').forEach(p => {
  p.setAttribute('stroke', 'none');
});
</script>
</head>
<body>

<h1>Create Batch</h1>

@if ($errors->any())
    <div>
        <strong>Please fix the following errors:</strong>

        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('batches.store') }}" method="POST">
    @csrf

    <div>
        <label>Batch Name</label>
        <input
            type="text"
            name="name"
            value="{{ old('name') }}"
        >
    </div>

    <br>

    <div>
        <label>Description</label>
        <textarea name="description">{{ old('description') }}</textarea>
    </div>

    <br>

    <button type="submit">Create Batch</button>

</form>

<br>

<a href="{{ route('batches.index') }}">
    Back to Batches
</a>

</body>
</html>
