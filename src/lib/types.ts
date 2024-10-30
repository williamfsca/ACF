export type FieldType = 
  | 'text'
  | 'textarea'
  | 'number'
  | 'email'
  | 'select'
  | 'checkbox'
  | 'radio'
  | 'date'
  | 'image'
  | 'repeater';

export interface FieldConfig {
  type: FieldType;
  label: string;
  name: string;
  required?: boolean;
  placeholder?: string;
  options?: { label: string; value: string | number }[];
  defaultValue?: any;
  validation?: {
    min?: number;
    max?: number;
    pattern?: RegExp;
    custom?: (value: any) => boolean | string;
  };
}

export interface FieldGroup {
  title: string;
  fields: FieldConfig[];
}