# Size

## Width
```scss
@include size.width(10);            // width: 10px;
@include size.min-width(10);        // min-width: 10px;
@include size.max-width(100);       // max-width: 100px;
@include size.width-auto();         // width: auto;
@include size.width-full();         // width: 100%;
@include size.width-fit();          // width: fit-content;
@include size.width-min-content();  // width: min-content;
@include size.width-max-content();  // width: max-content;
```

```scss
@include size.height(10);            // height: 10px;
@include size.min-height(10);        // min-height: 10px;
@include size.max-height(100);       // max-height: 100px;
@include size.height-auto();         // height: auto;
@include size.height-fit();          // height: fit-content;
@include size.height-min-content();  // height: min-content;
@include size.height-max-content();  // height: max-content;
```

```scss
@include size.size(30, 40);         // width: 30px; height: 40px;
@include size.min-size(30, 40);     // min-width: 30px; min-height: 40px;
@include size.max-size(30, 40);     // max-width: 30px; max-height: 40px;
```

```scss
@include size.square(30);           // width: 30px; height: 30px;
@include size.intrinsic();          // width: max-content; height: auto;
@include size.auto();               // width: auto; height: auto;
@include size.full();               // width: 100%; height: 100%;
```

```scss
@include size.box-sizing();         // box-sizing: border-box;
```

```scss
@include size.height-viewport();    // height: 100vh; height: 100dvh;
@include size.width-viewport();     // width: 100vw; width: 100dvw;
```