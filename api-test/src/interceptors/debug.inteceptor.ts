import { Injectable, NestInterceptor, ExecutionContext, CallHandler } from '@nestjs/common';
import { Observable } from 'rxjs';
import { tap } from 'rxjs/operators';

@Injectable()
export class DebugInterceptor implements NestInterceptor {
  intercept(context: ExecutionContext, next: CallHandler): Observable<any> {
    console.log('Mongoose queries:', context.getArgs());
    return next.handle().pipe(
      tap(() => {
        console.log('Mongoose queries executed successfully');
      }),
    );
  }
}