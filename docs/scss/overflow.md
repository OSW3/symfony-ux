# Overflow

## Width
```scss
@include overflow.overflow(visible, false); // overflow: visible;
@include overflow.overflow(hidden, false); // overflow: hidden;
@include overflow.overflow(clip, false); // overflow: clip;
@include overflow.overflow(scroll, false); // overflow: scroll;
@include overflow.overflow(auto, false); // overflow: auto;
```

```scss
@include overflow.overflow-x(visible, false); // overflow-x: visible;
@include overflow.overflow-x(hidden, false); // overflow-x: hidden;
@include overflow.overflow-x(clip, false); // overflow-x: clip;
@include overflow.overflow-x(scroll, false); // overflow-x: scroll;
@include overflow.overflow-x(auto, false); // overflow-x: auto;
```

```scss
@include overflow.overflow-y(visible, false); // overflow-y: visible;
@include overflow.overflow-y(hidden, false); // overflow-y: hidden;
@include overflow.overflow-y(clip, false); // overflow-y: clip;
@include overflow.overflow-y(scroll, false); // overflow-y: scroll;
@include overflow.overflow-y(auto, false); // overflow-y: auto;
```

```scss
@include overflow.overflow-visible(false); // overflow: visible;
@include overflow.overflow-hidden(false); // overflow: hidden;
@include overflow.overflow-clip(false); // overflow: clip;
@include overflow.overflow-scroll(false); // overflow: scroll;
@include overflow.overflow-auto(false); // overflow: auto;
```

```scss
@include overflow.overflow-inline(visible, false); // overflow-x: visible;
@include overflow.overflow-inline(hidden, false); // overflow-x: hidden;
@include overflow.overflow-inline(clip, false); // overflow-x: clip;
@include overflow.overflow-inline(scroll, false); // overflow-x: scroll;
@include overflow.overflow-inline(auto, false); // overflow-x: auto;
```

```scss
@include overflow.overflow-block(visible, false); // overflow-y: visible;
@include overflow.overflow-block(hidden, false); // overflow-y: hidden;
@include overflow.overflow-block(clip, false); // overflow-y: clip;
@include overflow.overflow-block(scroll, false); // overflow-y: scroll;
@include overflow.overflow-block(auto, false); // overflow-y: auto;
```

```scss
@include overflow.overflow-scrollbars-hide();
// scrollbar-width: none;
// .xx::-webkit-scrollbar {
//   width: 0;
//   height: 0;
// }
```

```scss
@include overflow.overflow-smooth-scroll(); // scroll-behavior: smooth;
```

```scss
@include overflow.overflow-contain(x); // contain: content; overflow-x: auto;
@include overflow.overflow-contain(y); // contain: content; overflow-y: auto;
@include overflow.overflow-contain(); // contain: content; overflow: auto;
@include overflow.overflow-touch(); // -webkit-overflow-scrolling: touch;
```

```scss
@include overflow.visibility(visible); // visibility: visible;
@include overflow.visibility(hidden); // visibility: hidden;
@include overflow.visibility(collapse); // visibility: collapse;
```

```scss
@include overflow.visibility-visible(); // visibility: visible;
@include overflow.visibility-hidden(); // visibility: hidden;
@include overflow.visibility-collapse(); // visibility: collapse;
```